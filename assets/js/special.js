$(document).ready(function() {
    var sort = 0;
    var strana = 0;
    var kat_id = 0;
    var search=$("#search").val();
    $.ajax({
        url: "ispisAlbuma.php",
        method: "GET",
        dataType: "json",
        success: function(data){
            prikazProizvoda(data);
        },
        error: function(xhr,status,error){
            console.log(xhr,status,error);
        }
    })

    function prikazProizvoda(podaciAlbum){
        var brojac = 0;
        var ispis = "<div class='section group example'>";
        for(let album of podaciAlbum){
            if(brojac == 5){
                ispis += "<div class='section group example'>";
            }
            ispis += ispisProizvoda(album);
            if(brojac == 4){
                ispis +="</div>";
            }
            brojac++;
        }
        ispis +="</div>";

        document.getElementById("prikazProizvoda").innerHTML = ispis;
    }

    function ispisProizvoda(album){
        return `<div class="grid_1_of_2 images_1_of_2">
        <img src="${album.slika}" alt="${album.alt}" />
         <h3>${album.naziv}</h3>
      <span class="godina"><sup>Year: ${album.godina}</sup></span>
       <div class="button"><span><a href="details.php?id=${album.id}" data-id=${album.id} class="showMore">Show more</a></span></div>
   </div>`
    }


    document.getElementById("selectPrductSort").onchange = function(vrednost){
        sort = vrednost.target.value;

        $.ajax({
            url : "ispisAlbuma.php?sort=" + sort + "&strana=" + strana + "&kat_id=" + kat_id+"",
            method : "GET",
            dataType : "json",
            success : function(data){
                prikazProizvoda(data);
            },
            error : function(xhr, status, error){
                console.log(error);
            }
        });
    }

    $('.pag').click(promeniStranu);

    function promeniStranu(e){
        e.preventDefault();
        strana = this.dataset.id;
        let url = "ispisAlbuma.php?strana=" + strana + "&sort=" + sort + "&kat_id=" + kat_id;
        $.ajax({
            url: url,
            method: "GET",
            dataType: "json",
            success: function(data){
                prikazProizvoda(data);
            },
            error: function(xhr,status,error){
                console.log(xhr,status,error);
            }
        })
    }


    $('.filter-category').click(filtrirajPoKategoriji);

    function filtrirajPoKategoriji(e){
        kat_id = this.dataset.id;
        let urlPaginacija = "paginacija.php?kat_id=" + kat_id;
        $.ajax({
            url: urlPaginacija,
            method : "GET",
            success: function(data){
                document.getElementById("paginacija").innerHTML = data;
            },
            error: function(xhr,status,error){
                console.log(xhr,status,error);
            }
        })
        e.preventDefault();
        
        let urlAlbumi = "ispisAlbuma.php?kat_id=" + kat_id + "&strana=1&sort=" + sort;
        $.ajax({
            url : urlAlbumi,
            method : "GET",
            dataType : "json",
            success: function(data){
                prikazProizvoda(data);
            },
            error: function(xhr,status,error){
                console.log(xhr,status,error);
            }
        })
    }
})
