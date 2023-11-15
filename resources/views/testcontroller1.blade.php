<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    @foreach ($portofolio as $porto)

    <div class="card" style="width: 18rem;">
        <img src="{{$porto->image_url}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h4 class="card-title">{{$porto->tittle}}</h4>
          <p class="card-text">{{$porto->description}}</p>
            <div class="container px-4 text-center">
                <div class="row gx-5">
                    <?php
                    foreach ($tags as $tag) {
                      if($porto->id_content == $tag->id_content){
                          ?>
                          <div class="col">
                              <div class="p-3"><a href="#" class="btn btn-primary">{{$tag->tag}}</a></div>
                          </div>
                          <?php
                      }
                    }
                  ?>
                </div>
            </div>
          <br>
          <a class="card-text">{{$porto->name}}</a>
        </div>
      </div>
      <br>
    @endforeach
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
