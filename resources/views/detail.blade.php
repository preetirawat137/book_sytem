<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="jquery.rateyo.css" />
    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Book</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ url('/attach') }}"> Back</a>
                </div>
            </div>
        </div>
        @foreach ($books as $item)
            <div class="card" style="width:50%;">
                <img src="{{ $item->image }}" width="200px" height="300px"class="card-img-top" alt="book">
                <div class="card-body">
                    <h5 class="card-title">Book Details</h5>
                    <strong>Book Name:</strong>
                    {{-- @foreach ($books as $item) --}}
                    <ul>
                        <li>{{ $item->name }}</li>
                    </ul>
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <ul>
                        <li>{{ $item->description }}</li>
                    </ul>
                </div>
                <div class="form-group">
                    <strong>Author:</strong>
                    @forelse ($item->authors as $authitem)
                        <ul>
                            <li> {{ $authitem->name }}</li>
                        </ul>
                    @empty
                        no author
                    @endforelse
                </div>
                <div class="form-group">
                    <strong>Category:</strong>
                    @forelse ($item->Category as $Catitem)
                        <ul>
                            <li> {{ $Catitem->name }}</li>
                        </ul>
                    @empty
                        no category
                    @endforelse
                </div>
                <div class="form-group">
                    <strong>Genre:</strong>
                    @forelse ($item->genre as $genreitem)
                        <ul>
                            <li> {{ $genreitem->name }}</li>
                        </ul>
                    @empty
                        no genre
                    @endforelse
                </div>
      
        <a href="{{url('review-form/'.$item->id)}}" class="btn btn-primary" width="500px;">Review</a>
            </div>
            @endforeach
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
