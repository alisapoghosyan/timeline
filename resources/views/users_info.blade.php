@include('edit')
@include('head')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
 <script type="text/javascript" src="{{asset('js/script.js')}}" defer></script>
 @include('nav')
<div class="container">
    <div class="col-md-12">
        <div class="card b-1 hover-shadow mb-20">
            @if(!$employee)
                <h2 style="text-align: center;color: red">There is no User</h2>
            @endif
            @if($employee)
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employee as  $data)
                        <tr>
                            <td>
                                <span class="fs-20 pr-16">{{$data['id']}}</span>
                            </td>
                            <td>
                                <img style="width: 50px;aspect-ratio: 1" class="avatar avatar-xl no-radius" src="<?php echo asset("storage/user_images/".$data['img'])?>" alt="...">
                            </td>
                            <td>
                                <span class="fs-20 pr-16">{{$data['firstname']}}</span>
                            </td>
                            <td>
                                <span class="fs-20 pr-16">{{$data['lastname']}}</span>
                            </td>
                            <td>
                                <strong><?php echo substr($data['startTime'],6)?>:00</strong>
                            </td>
                            <td>
                                <strong><?php echo substr($data['endTime'],6)?>:00</strong>
                            </td>
                            <td>
                                @if ($data['deleted_at'])
                                    <a class="btn btn-xs fs-10 btn-bold btn-warning btn-active"
                                       data-code = '{{$data['id']}}'
                                       id="activeItem"
                                    >Active</a>
                                @endif
                                @if(!$data['deleted_at'])
                                    <a class="btn btn-xs fs-10 btn-bold btn-info"
                                       data-name='{{$data['firstname']}} '
                                       data-lastname = '{{$data['lastname']}}'
                                       data-id = '{{$data['id']}}'
                                       data-img = '{{$data['img']}}'
                                       data-startTime = '{{$data['startTime']}}'
                                       data-endTime = '{{$data['endTime']}}'
                                    >
                                        Edit</a>
                                    <a class="btn btn-xs fs-10 btn-bold btn-warning btn-del"
                                       data-code = '{{$data['id']}}'
                                       id="deleteItem"
                                    >Deactive</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
 @if (URL::current() == url('/users_list/users_list')  || URL::current() == url('/admin'))
     <form class="form-inline searchForm" style="margin:0 auto ;width: 500px">
         <div class="input-group">
             <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1">@</span>
             </div>
             <input type="search" class="form-control search" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
             <button type="submit">Search</button>
         </div>
     </form>
 @endif
</body>
</html>
