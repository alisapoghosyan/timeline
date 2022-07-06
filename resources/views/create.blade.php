<!doctype html>
<html lang="en">
<head>
    @include('head')
</head>
<body>
    <div class="modalDiv">
        <div class="form">
            <i class="fas fa-times"></i>
            <div class="title">Welcome</div>
            <div class="subtitle">Let's create new user!</div>
            <form class="creatingForm">
            @csrf
            @include('inputs')
                <button type="text" class="submit">submit</button>
            </form>
        </div>
    </div>
</body>
</html>
