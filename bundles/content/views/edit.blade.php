 
<?php $files = Files::all();?>


<div id="images">
 <button class="btn btn-primary"  id="close_image_manager">Close</button>
 <ul class="filemanager" id="uItem" >
<?php foreach($files as $file):?>

<li>
  <p>
  
  
                       <img src="<?php echo $file->location;?>" />
                        
                        <span><?php echo $file->location;?></span>
                          
  </p>
</li>

<?php endforeach;?>
</ul>
</div>

<br/> 
<?php echo Form::open('content/edit') ?>

<?php echo Form::hidden('page_id', $page_id); ?>


<?php  echo Form::hidden('id', $id); ?>


<?php echo Form::hidden('global', $global); ?>


<?php echo Form::textarea('content', $block->content , array('id'=>'editor-'.$block->id)); ?>

<br/>
<label>Template:</label>
<?php
$dir = array();

$path = CMS::get_templates(USER_BUNDLE_PATH.'content/views/templates/'); 

$pa = is_dir($path);

  if($pa == true)

$dir[] = $path;    

if(!empty($dir))
       
       foreach($dir as $d)

       $ps = CMS::readFolder($d);
       $content_templates[''] = 'no template';
      foreach($ps as $key=>$value)
       $content_templates[$value] =  $value;






?>
<?php echo Form::select('template', $content_templates, $block->template); ?>
<br/>

<?php echo Form::submit('Save',array('class'=>'btn  btn-primary')); ?>
<?php echo Form::close() ?>

<div class="buttons-content">
<button class="btn btn-info bt-max"  id="media-selector"><i class="icon-picture"></i>Media</button>
</div>



<script type="text/javascript">


       CKEDITOR.replace( 'editor-<?php echo $block->id;?>', {
          extraPlugins : 'internpage',
          removePlugins :'devtools',
          toolbar :
          [
            ['Source','oembed','-', 'Bold', 'Italic', 'TextColor', 'BGColor', '-', 'NumberedList', 'BulletedList' ,'-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull', '-', 'Link', 'Unlink', "Anchor", 'Image','HorizontalRule','Styles','Format','Font','FontSize' ]
      ],


      });

      
     
  
      $('.modal').bind('hidden', function () {
        window.location.reload(true);
      });   
    
     $('#uItem p').click(function(){
      
      var $this = $(this);

      var text =  $this.text();

      var site_url = '<?php echo url();?>';

      var image_url = site_url+$.trim(text); 
    
      CKEDITOR.instances.editor.insertHtml('<img src="'+image_url+'"/>');

      });   

     $("#close_image_manager").click(function () {
      
      

      $('#images').hide();
      
      $('#media-selector').show();



      


      });   

    

     $("#media-selector").click(function (event) {
      
      event.preventDefault();

      $('#images').show();
      
      $('#media-selector').hide();



      


        

    });

</script>