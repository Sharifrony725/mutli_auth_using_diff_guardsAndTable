@extends('includes.master')
    @section('content')
          <section class="py-5">
            <div class="container">
              <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>User Login</h3>
                    </div>
                    <div class="card-body">
                        <h4 class="text-center text-success">
                            <span></span>
                        </h4><br>
                        <form action="{{ route('login_submit') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label col-md-3"></label>
                                <div class="col-md-9 ">
                                    <input type="submit" name="btn" class="btn btn-outline-success" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </section>
    @endsection
