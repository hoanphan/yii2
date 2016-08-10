<?php
/**
 * Created by PhpStorm.
 * User: HOANDHTB
 * Date: 8/8/2016
 * Time: 5:38 PM
 */

namespace app\commands;


use app\models\Post;
use app\models\Test;

use navatech\simplehtmldom\SimpleHTMLDom;

use yii\base\Exception;
use yii\bootstrap\Html;
use yii\console\Controller;
use navatech\simplehtmldom\simple_html_dom;

class PostController extends Controller
{
    public function actionIndex()
    {
        /**@var Post[] $posts */
        $posts = Post::find()->all();
        foreach ($posts as $post) {
            echo $post->title . PHP_EOL;
        }
    }

    public function actionView($id)
    {
        $post = Post::findOne($id);
        echo $post->title;
    }

    public function actionImport($rss){
     $file= SimpleHTMLDom::file_get_html(rss);
      foreach ($file->find('item') as $element)
      {
            $titles=$element->find('title');
            $description=$element->find('description');
            $link=$element->find('link');
            $image=$element->find('image');

            $test=new \app\models\Simplehtmldom();
            $test->title= $titles[0]->text();
          $test->description=$description[0]->text();

          $test->image=$image[0]->xmltext();

        $link[0]->innertext='link';
          $str= $element->xmltext();
         $vt1=strpos($str,"<link> ");
          $vt2=strpos($str,"</link>");
         $str1= substr($str,$vt1+6,$vt2-$vt1-7);
          $test->link=trim($str1);
          $test->content='aaa';
          $test->save();




      }
      echo "ok";
    }
   /* $rss='http://vietnamnet.vn/rss/home.rss'*/
    public function  actionData($rss,$topic)
    {
        $url=$rss;
        $file=new \XMLReader();
        $file->open($url);
        $arr=array();
        $arr1=array();
        while ($file->read())
        {
            $readXml=new \app\models\Simplehtmldom();
            if($file->nodeType==\XMLReader::ELEMENT&&$file->localName=='title')
            {
                $file->read();
                if($file->value!=null) {
                    $arr1[0] = $file->value;
                }

            }
            if($file->nodeType==\XMLReader::ELEMENT&&$file->localName=='description')
            {
                $file->read();
                if($file->value!=null)
                    $arr1[1]=$file->value;
            }
            if($file->nodeType==\XMLReader::ELEMENT&&$file->localName=='link')
            {

                $file->read();
                if($file->value!=null)
                    $arr1[2]=$file->value;
            }
            if($file->nodeType==\XMLReader::ELEMENT&&$file->localName=='image')
            {

                $file->read();
                if($file->value!=null)
                    $arr1[3]=$file->value;
            }
            if(count($arr1)==4)
            {

                $list=\app\models\Simplehtmldom::find()->where(['title'=>$arr1[0]])->all();
                if(count($list)==0)
                {
                    $readXml->title=$arr1[0];
                    $readXml->description=$arr1[1];
                    $readXml->content='aaa';
                    $readXml->link=trim($arr1[2]);
                    $readXml->image=$arr1[3];
                    $readXml->topic=$topic;
                    $readXml->save();
                }

            }
        }
        echo "ok";
    }
    public function actionDelete()
    {
        $files=\app\models\Simplehtmldom::deleteAll();
        echo "ok";
    }
}