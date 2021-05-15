@extends('layouts.app')

@section('content')
    <!-- first section -->
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                <div class="jumbotron">
                    <h1 class="display-4">GIF Browsing</h1>
                    <p class="lead">This is a simple GIF browsing website.</p>
                    <hr class="my-4">
                    <p>Enter the keyword, then click search</p>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" id="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" id=btnSearch type="submit">Search</button>
                    </form>
                  </div>
             </div>
         </div>
     </div>
    <!-- GIF thumbnails -->
     <div class="container">
         <div class="text-center m-5">
            <h3>GIF Thumbnails</h3>
         </div>
         <div class="row">

            @for ($i = 0; $i < 9; $i++)
            <?php
               $imageId='image'.$i;
               $cardId='card'.$i;
            ?>
            <div class="col-lg-4 p-1 col-md-6 col-12">
                <div class="card">
                    <img src=# id={{$imageId}} class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title" id ={{$cardId}}></h5>
                    </div>
                  </div>
             </div>
            @endfor
         </div>
     </div>

     <!--pagination -->
     <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" id ="item1" onclick="return init1();" >1</a></li>
              <li class="page-item"><a class="page-link" id ="item2" onclick="return init2();" >2</a></li>
              <li class="page-item"><a class="page-link" id ="item3" onclick="return init3();" >3</a></li>
            </ul>
          </nav>
     </div>

      <script>
        var endIndex=0;
        let APIKEY = "41w02pG7951iQS33PKHfgBxSxrfn0EcO";
        document.addEventListener("DOMContentLoaded", init);
        function init() {
          document.getElementById("btnSearch").addEventListener("click", ev => {
            ev.preventDefault(); //to stop the page reload
            let url = `https://api.giphy.com/v1/gifs/search?api_key=${APIKEY}&q=`;
            let keyword = document.getElementById("search").value.trim();
            url = url.concat(keyword).concat('&limit=9&offset=');
            url=url.concat(endIndex);

            console.log(url);
            fetch(url)
              .then(response => response.json())
              .then(content => {
                console.log(content.data);
                console.log("META", content.meta);
                console.log(endIndex);
                $i=0;
                for (const prop in content.data)
                {
                      let img=document.getElementById("image"+$i);
                      let imgTitle=document.getElementById("card"+$i);

                      img.src = content.data[prop].images.downsized.url;
                      img.alt = content.data[prop].title;
                      imgTitle.textContent=content.data[prop].title;
                      $i++;
               }
              })
              .catch(err => {
                console.error(err);
              });
          });
        }

        function init1() {
            endIndex=0;
            document.getElementById("item1").addEventListener("click", ev => {
            ev.preventDefault(); //to stop the page reload
            let url = `https://api.giphy.com/v1/gifs/search?api_key=${APIKEY}&q=`;
            let keyword = document.getElementById("search").value.trim();
            url = url.concat(keyword).concat('&limit=9&offset=');
            url=url.concat(endIndex);

            console.log(url);
            fetch(url)
              .then(response => response.json())
              .then(content => {
                console.log(content.data);
                console.log("META", content.meta);
                console.log(endIndex);
                $i=0;
                for (const prop in content.data)
                {
                      let img=document.getElementById("image"+$i);
                      let imgTitle=document.getElementById("card"+$i);

                      img.src = content.data[prop].images.downsized.url;
                      img.alt = content.data[prop].title;
                      imgTitle.textContent=content.data[prop].title;
                      $i++;
               }
              })
              .catch(err => {
                console.error(err);
              });
          });
        }
        function init2() {
            endIndex=9
            document.getElementById("item2").addEventListener("click", ev => {
            ev.preventDefault(); //to stop the page reload
            let url = `https://api.giphy.com/v1/gifs/search?api_key=${APIKEY}&q=`;
            let keyword = document.getElementById("search").value.trim();
            url = url.concat(keyword).concat('&limit=9&offset=');
            url=url.concat(endIndex);

            console.log(url);
            fetch(url)
              .then(response => response.json())
              .then(content => {
                console.log(content.data);
                console.log("META", content.meta);
                console.log(endIndex);
                $i=0;
                for (const prop in content.data)
                {
                      let img=document.getElementById("image"+$i);
                      let imgTitle=document.getElementById("card"+$i);

                      img.src = content.data[prop].images.downsized.url;
                      img.alt = content.data[prop].title;
                      imgTitle.textContent=content.data[prop].title;
                      $i++;
               }
              })
              .catch(err => {
                console.error(err);
              });
          });
        }
        function init3() {
            endIndex=18;
            document.getElementById("item3").addEventListener("click", ev => {
            ev.preventDefault(); //to stop the page reload
            let url = `https://api.giphy.com/v1/gifs/search?api_key=${APIKEY}&q=`;
            let keyword = document.getElementById("search").value.trim();
            url = url.concat(keyword).concat('&limit=9&offset=');
            url=url.concat(endIndex);

            console.log(url);
            fetch(url)
              .then(response => response.json())
              .then(content => {
                console.log(content.data);
                console.log("META", content.meta);
                console.log(endIndex);
                $i=0;
                for (const prop in content.data)
                {
                      let img=document.getElementById("image"+$i);
                      let imgTitle=document.getElementById("card"+$i);

                      img.src = content.data[prop].images.downsized.url;
                      img.alt = content.data[prop].title;
                      imgTitle.textContent=content.data[prop].title;
                      $i++;
               }
              })
              .catch(err => {
                console.error(err);
              });
          });
        }
      </script>
@endsection
