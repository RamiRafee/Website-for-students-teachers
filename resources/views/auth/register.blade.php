@extends('home.index')
@section('header')
<div class="container px-lg-5">
    <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
        <div class="m-4 m-lg-5">
            <h1 class="display-5 fw-bold">A warm welcome For The NEW User! </h1>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container px-lg-5">
    <!-- Page Features-->
    <div class="d-flex align-items-center justify-content-center">
        
        <div class="col-lg-5 col-xxl-5 mb-5">
            <form action="{{route('auth.handleRegister') }} " method="post">
                @csrf
                
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form2Example1" class="form-control" name="email"/>
                  <label class="form-label" for="form2Example1" >Email address</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="form2Example1" class="form-control" name="name"/>
                    <label class="form-label" for="form2Example1" >Name</label>
                  </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form2Example2" class="form-control" name="password"/>
                  <label class="form-label" for="form2Example2" >Password</label>
                </div>
              
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                    
                      <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
                    </div>
                
                    
                  </div>
                  
                </div>
              
                <!-- Submit button -->
              
                <!-- Register buttons -->
                
              </form>
        </div>
        
        
        
       
    </div>
</div>
@endsection
