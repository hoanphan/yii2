
<div class="col-xs-12">
    <h3 class="header smaller lighter green">Application Buttons</h3>

    <p></p>

    <button class="btn btn-app btn-danger btn-sm">
        <i class="ace-icon fa fa-cloud-upload bigger-200"></i>
        Post <?=\app\models\Post::find()->count()?>

    </button>

    <button class="btn btn-app btn-primary btn-sm">
        <i class="ace-icon  glyphicon glyphicon-film bigger-200"></i>
        Video <?=\app\models\Video::find()->count()?>
    </button>



</div>

