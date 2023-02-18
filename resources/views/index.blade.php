<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

<style>
    .btn{
        position: relative;
        left: 130px
    }
    html,body{
        overflow: hidden;
    }
    form i {
    position: absolute;
    cursor: default;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 18px;
    pointer-events: none;
    color: #bfbfbf;
}
.box{
    position: relative;
}
.icon i {
    position: absolute;
    top: 30%;
    left: 5%;
}
body{
    background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
}
form {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  animation: bounceIn 0.5s ease-in-out;
}

@keyframes bounceIn {
  0% {
    opacity: 0;
    transform: translate3d(0, 50%, 0);
  }
  100% {
    opacity: 1;
    transform: none;
  }
}
@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-30px);
  }
  60% {
    transform: translateY(-15px);
  }
}

.bounce {
  animation: bounce 1s ease-in-out;
}

input:focus + hr {
    border-bottom: 2px solid #0093E9;
}

hr {
    border: none;
    border-bottom: 1px solid #ccc;
    margin-top: 0.5rem;
}
.input-hover-effect {
  border: none;
  height: 2px;
  background-color: #0093E9;
  transition: all 0.2s ease-out;
}

.form-control:hover + .input-hover-effect {
  height: 4px;
}
.title {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    opacity: 1;
    animation: fadeIn 1s ease-in-out 0.5s forwards;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translate(-50%, -60%);
    }
    100% {
        opacity: 1;
        transform: translate(-50%, -50%);
    }
}

.closebtn {
  margin-left: 15px;
  color: gray;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
  border: none
}

.closebtn:hover {
  color: black;
}

</style>
</head>
<body>
    <div class="title">
        <h1>BMI Calculator</h1>
    </div>
    <form class="bounce" action="{{ route('bmi.store') }}" method="post">
        @csrf
        <div class="container">
            <x-flash-message />
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Body Mass Index (BMI) Calculator!</div>
                        <div class="card-body">
                            <div class="form-group row">
                                
                                <label for="weight" class="col-sm-3 col-form-label">Weight (kg)</label>
                                <div class="col-sm-9">
                                    <input type="number" min="1" max="1000" class="form-control @error('weight')border border-danger @enderror" id="weight" name="weight" value="{{old('weight')}}" placeholder="60">
                                    <hr class="input-hover-effect">
                                    @error('weight')
                                    <div class="text-danger small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row box icon">
                                <label for="height" class="col-sm-3 col-form-label">Height (cm)</label>
                                <div class="col-sm-9">
                                    <input type="number" min="1" step="0.01" class="form-control @error('height')border border-danger @enderror" name="height" id="height" value="{{old('height')}}" placeholder="175">
                                    <hr class="input-hover-effect">
                                    @error('height')
                                    <div class="text-danger small mt-1">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group row justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-success btn-block ">Show my BMI</button>
                                </div>
                                <div class="form-group row justify-content-center align-items-center">
                                    @if (session('bmi'))
                                        @php
                                            $bmi = session('bmi');
                                            if($bmi < 18.5){
                                                $result = 'text-danger';
                                                $info = ', which means you are underweight!';
                                            }elseif ($bmi < 25) {
                                                $result = 'text-success';
                                                $info = ', which means you within a healthy weight range!';
                                            }else {
                                                $result = 'text-danger';
                                                $info = ', which means you are obese!';
                                            }
                                        @endphp
                                        <div class="{{ $result }}">Your BMI is {{ session('bmi') }}{{ $info }}
                        
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>