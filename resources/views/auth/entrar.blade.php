@extends('Layouts.login')

@section('css')

<style>
.container {
  display: block;
  margin-top: 10%;
  margin-left: auto;
  margin-right: auto;
}

:root {
  --input-padding-x: 1rem;
  --input-padding-y: .75rem;
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.card-signin .card-image {
  width: 147px;
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
  height: 141px;
  border-radius: 50%;
  background-color: #fff;
  margin-top: -6.3rem;
  display: flex;
  justify-content: center;
  align-items: center;
  border: solid 6px #f1f1f1;
}

.card-signin .card-body {
  padding: 2rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

img {
  width: 100%;
  vertical-align: middle;
  border-style: none;
  height: auto;
}

.form-signin {
  width: 100%;
  display: flow-root;
  flex-direction: column;
  align-items: baseline;
}

.form-signin .btn {
  width: 80%;
  height: 40px !important;
  font-size: 11px;
  border-radius: 5rem;
  letter-spacing: .05rem;
  font-weight: bold;
  transition: all 0.2s;
  font-family: Arial, sans-serif;
  margin-left: 10%;
  background-color: #76DCD1;
  border: none;
}
.form-control:focus {
  border-color: #76DCD1;
}
.form-label {
  position: relative;
  margin-bottom: 1rem;
  flex: 1;
  margin-left: 10%;
}

.form-label input {
  width: 90%;
  height: 40px;
  border-radius: 2rem;
  border-radius: 2rem;
}

.form-label>input,
.form-label>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label>label>i {
  font-size: 12px;
}

.form-label>label {
  position: absolute;
  top: -5px;
  left: 0;
  display: block;
  width: 90%;
  margin-bottom: 0;
  line-height: 1.5;
  font-size: 14px;
  font-weight: 600 !important;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label input::placeholder {
  color: transparent;
}

.form-label input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

</style>

@endsection

@section('body')
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <div class="card-image">
              <img src="https://i.ibb.co/JRwYHF1/logo-removebg-preview-1.png" alt="logo-removebg-preview-1" border="0">
            </div>
            <form class="form-signin">
              <div class="form-label">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">
                  <i class="fas fa-user"></i> 
                  Email
                </label>
              </div>

              <div class="form-label">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">
                  <i class="fas fa-lock"></i>
                  Senha
                </label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Acessar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection