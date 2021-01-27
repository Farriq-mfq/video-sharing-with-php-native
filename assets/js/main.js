$(function(){
    // navbar

    const hamburger = $(".hamburger");
    const navbar = $(".navBar");
    hamburger.on('click',()=>{
       navbar.toggleClass('collapse');
    })


    function getLike(){
        const likel = $('#like').data('slug');
        $.get('../../ajax/getLike.php',{slug:likel},function(respon){
            $("#like span").html(respon)
        })
    }
    getLike();
    function getViewer(){
        const views = $('#like').data('slug');
        $.get('../../ajax/getViewer.php',{slug:views},function(respon){
            $("#views span").html(respon)
        })
    }
    getViewer();
    function getDownload(){
        const views = $('#like').data('slug');
        $.get('../../ajax/getDownload.php',{slug:views},function(respon){
            $("#download span").html(respon)
        })
    }
    getDownload();
    // likes
    $("#like").on('click',function(e){
      const slug = $(this).data('slug');
      $.ajax({
          method:'POST',
          data:{
              slug:slug
          },
          url:'../../ajax/liker.php',
          success:function(respon){
            getLike();
            console.log(respon)

          }
      })
    })

    $("#form__search").on("keyup",function(){
        cari($(this).val());

        if($(this).val() == ""){
          $("#search__val h3").html("")
        }else{
          $("#search__val h3").html(`Search : ${$(this).val()}`)
        }
    });
    function cari(value){
      $("#colVidee").each(function(){
        var ono = "false";
        $(this).each(function(){
          if ($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0) {
            ono="true";
          }
        });
        if (ono=="true") {
          $(this).show();
        }else{
          $(this).hide();
          
        }
      })
    }

    $("#download").on("click",function(e){
      e.preventDefault();
      const link = $(this).attr('href');
        const slug = $(this).data('slug');
        $.ajax({
          method:'POST',
          url:'../../ajax/download.php',
          data:{slug:slug},
          success:function(res){
            window.location.href = link;
          }
        })
    })
})