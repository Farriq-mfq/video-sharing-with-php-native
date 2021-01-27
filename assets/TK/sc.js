$(function(){
    
    
    $("#video").change(function(){
        const urltoobj = URL.createObjectURL(this.files[0]);
        $("#videos").attr('src',urltoobj);
    })
    
    const video = document.querySelector("#videos");
    const canvas = document.querySelector("#canvas");
    
    let urlImg = [];
    video.addEventListener('loadedmetadata',function(){
        setTimeout(() => {
            canvas.getContext('2d').drawImage(video,0,0,canvas.width,canvas.height);
            // validate 
            urlImg = [];
            urlImg.push(canvas.toDataURL())
        }, 500)
        
    },false)
    


    // upload video
    $("#upload").on('submit',function(e){
        e.preventDefault();
        const files = document.querySelector("#video").files[0];
        const formData = new FormData();
        formData.append('judul',document.querySelector('#judul').value);
        formData.append('video',files);
        formData.append('deskripsi',document.querySelector('#deskripsi').value);
        formData.append('thumbnail',urlImg[0]);
        
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
            
                xhr.upload.addEventListener("progress", function(evt) {
                  if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = Math.round(parseInt(percentComplete * 100));
                    $(".progress-bar").width(percentComplete+'%');
                    $(".progress-bar").html(percentComplete+'%');  
            
                  }
                }, false);
            
                return xhr;
              },
            beforeSend:function(){
                $(".progress").show();
                $("#btnup").attr('disabled',true);
            },
            method:'POST',
            data:formData,
            url:'Uploaded.php',
            contentType:false,
            cache:false,
            processData:false,
            complete:function(){
                $(".progress-bar").width(0);
                $(".progress-bar").html('0%');
                $("#btnup").attr('disabled',false);
                $(".progress").hide();
            },
            dataType:'json',
            success:function(respone){
                if(respone.error){
                    $("#alert").html(`<div class="alert alert-danger" role="alert">
                    ${respone.error}
                </div>`)
            }else{
                $("#alert").html(`<div class="alert alert-success" role="alert">
                ${respone.success}
            </div>`)
                }
                $("#upload")[0].reset();
            }
        })
        
    })
})

$("#add").click(()=>{
    $(".mod").toggleClass('toggle');
})
$(".close").click(()=>{
    $(".mod").addClass('toggle');
})
$(document).on("click","#btn__add__link",function(){
    $(this).parent().parent().siblings().toggleClass('toggle')
})

$(document).on("submit","#sub__link",function(e){
    e.preventDefault();
    const data = $(this).serialize();
    const input = $(this).children().children("#link");

    $.ajax({
        method:'POST',
        data:data,
        url:'download.php',
        success:function(res){
            input.css('border-color','green');
            setTimeout(() => {
                input.css('border-color','inherit');
            }, 500)
            
        }
    })
})


$("#add_tk").on('submit',function(e){
    e.preventDefault();
    $.ajax({
        method:'POST',
        data:$(this).serialize(),
        url:'addtk.php',
        success:function(response){
            $("#add_tk")[0].reset()
            $("#al").html(response)
            if(response == 'successfuly'){
                setTimeout(() => {
                    $(".mod").addClass('toggle');
                }, 1000)
                
            }
        }

    })

    $('#table').DataTable();

})