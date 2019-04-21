      var images = [];
      //cuantas imagenes quiero cargar
      images[1]="";
      images[2]="";
      images[3]="";     


            function readURL(input,idFile) {            
               
                  if (input.files && input.files[0]) {                    
                    images[idFile] = input.files[0]; 
                     cleanForm();            
                     chargeFiles(images);
                     resetButtonOnClick();
                  } else {
                     removeUpload('1');
                  }       

            }
            
            function chargeFiles(arrayFiles){                       
               
               $('.image-upload-wrap').hide();

               for(var i = 1; i <= 3; i++){  
                               
                  if(arrayFiles[i] != ""){
                  var file = arrayFiles[i];               
                  var img = $('#image-'+ i);
               
                  readFile(file,img);                   

                  $('#image-title-'+i).html(file.name);
                  $('#file-upload-'+i).show();                 
                  $('.file-upload-content').show();
                     
                  }    
               }         

            }

            function readFile(file,img){

               var reader = new FileReader();           

               reader.onload = function(e) {                  
                  img.attr("src",e.target.result);                             
                  };             
                  
                  reader.readAsDataURL(file);                
            }

            function cleanForm(){               
              
               $('.file-upload-content').hide();              

               for(var i = 1; i <= 3; i++){             
               $('#image-'+i).attr('src', "#");
               $('#file-upload-'+i).hide(); 

               }

               $('.image-upload-wrap').show();

            }

            function resetButtonOnClick(){                

                if($('#file1').val() == "")
                {
                  $('#btn-upload-1').attr("onclick","$('#file1').trigger( 'click' )");
                }
                else
                {
                  if($('#file2').val() == "")
                  {
                     $('#btn-upload-1').attr("onclick","$('#file2').trigger( 'click' )");
                  }
                  else
                  {
                     if($('#file3').val() == "")
                     {
                        $('#btn-upload-1').attr("onclick","$('#file3').trigger( 'click' )");
                     }
                     else
                     {
                        $('#btn-upload-1').attr("onclick","$('#file1').trigger( 'click' )");
                     } 
                  } 

                }            
             

            }

            function removeUpload(idImage) {

               images[idImage]= "";
               $('#file'+idImage).val("");
               cleanForm();
               resetButtonOnClick(); 

               if(images[1] != "" && images[2] != "" && images[3] != "")             
               chargeFiles(images);
              
            }

            $('.image-upload-wrap').bind('dragover', function () {
                  $('.image-upload-wrap').addClass('image-dropping');
               });
               $('.image-upload-wrap').bind('dragleave', function () {
                  $('.image-upload-wrap').removeClass('image-dropping');
            });
