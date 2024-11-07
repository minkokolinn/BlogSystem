<x-layout>
    <x-slot name="title">
        <title>Login</title>
    </x-slot>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center">Login Form</h3>
                <div class="card shadow-sm my-3 p-4">
                    <form method="post" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            <x-error name="email"></x-error>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                            <x-error name="password"></x-error>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
