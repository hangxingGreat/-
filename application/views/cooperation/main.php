<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>国际合作</title>
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <script src="<?=base_url()?>js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap-switch.min.js"></script>
        <script type="text/javascript">
    $(document).ready(function(){

      $("#refresh_list").click(function()
      {
        $.get("<?=site_url('cooperationmanage/show')?>",function(data,status){
          $("#detail").html(data);
        });
      });

      $("#refresh_list").click();

      $("#remove_record").click(function()
      {
        $("#remove").slideToggle();
      });

      $(":submit").click(function()
      {
        $("#remove").hide();
        if($(event.target).text() == "删除")
        {
          var data = {
            category: $("#inputNewCategory").val(),
            number: $("#inputNewNumber").val(),
            place: $("#inputNewPlace").val(),
            purpose: $("#inputNewPurpose").val()
          };
          $.post("<?=site_url('cooperationmanage/delete')?>",data,function(res,status)
            {
              alert(res);
            }); 
        }else
        {
          var data = {
            category: $("#inputCategory").val(),
            list: $("#inputList").val(),
            number: $("#inputNumber").val(),
            place: $("#inputPlace").val(),
            purpose: $("#inputPurpose").val(),
            url: $("#inputURL").val(),
            news: $("#inputNews").val(),
            picture: $("#inputPicture").val()
          };
          $.post("<?=site_url('cooperationmanage/add')?>",data,function(res,status)
            {
              alert(res);
            });
        }
        // 刷新一次数据
        $("#refresh_list").click(); 
        return true;
      });
    });
    </script>
  </head>
  <body>

    <?php $this->load->view('template/navbar');?>

    <div class="container">
      <br/>
      <br/>
      <div class="page-header">
        <h1>科研成果管理平台 <small>Scientific Research Achievement Manage Platform</small></h1>
      </div>
      <div class="row">
        <h3 class="text-center">国际合作信息维护</h3>
      </div>
    <div>
        <a class="btn btn-default" id="refresh_list">刷新列表</a>
        <a class="btn btn-default" data-toggle="modal" data-target="#addModal">添加信息</a>
        <a class="btn btn-default" id="remove_record">删除记录</a>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title">添加人员信息</h4>
                </div>
                <div class="modal-body">
                      <form class="form-horizontal">
                          <div class="form-group">
                            <label for="inputCategory" class="col-sm-2 control-label">类别</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputCategory" name="category" placeholder="Category">
                            </div>
                            <label for="inputList" class="col-sm-2 control-label" name="list">人员列表</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputList" placeholder="List">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputNumber" class="col-sm-2 control-label" name="number">人数</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputNumber" placeholder="Number">
                            </div>
                            <label for="inputPlace" class="col-sm-2 control-label" name="place">来/出访地</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputPlace" placeholder="Place">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPurpose" class="col-sm-2 control-label" name="purpose">目的</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputPurpose" placeholder="Purpose">
                            </div>
                            <label for="inputURL" class="col-sm-2 control-label" name="url">URL</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputURL" placeholder="URL">
                            </div>
                          </div>
                           <div class="form-group">
                            <label for="inputNews" class="col-sm-2 control-label" name="news">新闻报道否</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputNews" placeholder="News reported">
                            </div>
                            <label for="inputPicture" class="col-sm-2 control-label" name="picture">照片保存否</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="inputPicture" placeholder="Picture Reserved">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-2">
                              <button type="submit" class="btn btn-default">添加</button>
                            </div>
                          </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
    </div>

    <br/>
    <div id="remove" hidden>
         <form class="form-inline" role="form">
            <div class="form-group">
              <label for="inputNewCategory" class="sr-only">类别</label>
              <input type="text" class="form-control" id="inputNewCategory" name="category" placeholder="Category">
          </div>
          <div class="form-group">
            <label for="inputNewNumber" class="sr-only" name="number">人数</label>
            <input type="text" class="form-control" id="inputNewNumber" placeholder="Number">
          </div>
          <div class="form-group">
            <label for="inputNewPurpose" class="sr-only" name="purpose">目的</label>
            <input type="text" class="form-control" id="inputNewPurpose" placeholder="Purpose">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default">删除</button>
        </div>
    </div>
    <br/>
    <div id="detail">
    </div> 

    <?php $this->load->view('template/footer') ?>
  </body>
</html>