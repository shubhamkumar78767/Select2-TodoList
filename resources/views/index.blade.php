<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <!-- select2 cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- select2 css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4 offset-4 mt-5">
                    <form action="{{ url('/post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input class="form-control" type="text" name="title" id="title">
                            @error('title') <label class="text-danger">{{ $message }}</label> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                            @error('description') <label class="text-danger">{{ $message }}</label> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Tags</label>
                            <select class="form-control tags" name="tags[]" id="tags" multiple="multiple">

                            </select>
                            @error('tags') <label class="text-danger">{{ $message }}</label> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" class="btn btn-sm btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $(".tags").select2({
                placeholder: 'select',
                allowClear:true,
            });

            $("#tags").select2({

                ajax:{
                    url: "{{ route('get-category') }}",
                    type: "POST",
                    delay: 250,
                    datatype: 'json',
                    data: function(params){
                        return{
                            name:params.term,
                            "_token": "{{ csrf_token() }}",
                        };
                    },

                    processResults:function(data){
                        return{
                            results: $.map(data, function(item){
                                return{
                                    id:item.id,
                                    text:item.title
                                }
                            })
                        }
                    }
                }
            });

        });
    </script>

</body>

</html>