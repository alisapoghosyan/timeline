<html lang="en">
<head>
    @include('head')
    <script type="text/javascript" src="{{asset('js/script.js')}}" defer></script>
</head>
<body>
@include('nav')
<div class="container removed">
    <div class="col-md-12">
        <div class="card b-1 hover-shadow mb-20">
        @if(!$employee)
            <h2 style="text-align: center;color: red">There is no User</h2>
        @endif
        @if($employee)
                <div style="width: 100%;display: flex;justify-content:space-evenly">
                    <select class="addselect select" style="margin-bottom: 15px" name="months">
                        <?php
                        $curmonth = date("F");
                        for($i = 1 ; $i <= 12; $i++)
                        {
                        $allmonth = date("F",mktime(0,0,0,$i,1,date("Y")))
                        ?>
                        <option value="<?php echo $i;?>"
                        <?php
                            if($curmonth==$allmonth) {
                                echo("selected");
                            }
                            ?>
                        >
                            <?php
                            echo date("F",mktime(0,0,0,$i,1,date("Y")));
                            }
                            ?>
                        </option>
                    </select>
                </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
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
                    @if(!$data['attendaces'])
                        <td>
                            <strong>Empty</strong>
                        </td>
                        <td>
                            <strong>Empty</strong>
                        </td>
                    @endif
                    @if($data['attendaces'])
                        <td>
                            <strong><?php echo substr($data['attendaces'][0]['enterTime'],11)?></strong>
                        </td>
                        <td>
                            <strong><?php echo substr($data['attendaces'][0]['outTime'],11)?></strong>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    </div>
    </div>
 </div>
</body>
</html>

