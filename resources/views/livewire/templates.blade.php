<div>
    <main id="main" class="main">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($next == 1)

            <div class="pagetitle">
                <h1>Template Table</h1>

                <div class="card">
                    <div class="card-body">
                        <div style="float:right;">
                            <a class="btn btn-block btn-primary my-3" wire:click="addTemplate">{{ $page_title }}</a>

                        </div>

                    <!--Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Discription</th>
                                <th scope="col">Image</th>

                                    <th scope="col">Action</th>


                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($templateCollection as $key => $template)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$template->title}}</td>
                                <td>{{$template->type}}</td>
                                <td>{{$template->discription}}</td>
                                
                                <td><a href="{{asset($template->images->file ?? "")}}" target="blank"><img width="200px" height="150px" src="{{$template->images->file ?? "" }} " /></a></td>

                                        <td><button type="button" class="btn btn-primary"
                                                wire:click="editTemplate({{ $template->id }})">Edit</button>
                                            <button type="button" class="btn btn-danger"
                                                wire:click="deleteTemplate({{ $template->id }})">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->



                    </div>
                </div>
            </div>
        @else()
            <div class="container">
                <section class="section  min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                                <div class="container">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2 class="card-title"> {{ $page_title }}</h2>

                                        </div>
                                        <div class="card-body mt-5">

                                            <!-- Horizontal Form -->
                                            <form wire:submit.prevent="StoreTemplate">
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">
                                                        Title</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="title"
                                                            wire:model="title">
                                                        @error('title')
                                                            <div class="mt-3 text-danger">* {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">
                                                        Type</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="type"
                                                            wire:model="type">
                                                        @error('type')
                                                            <div class="mt-3 text-danger">* {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label">
                                                    File Upload</label>

                                                 <div class="col-sm-8">
                                                    <input class="form-control"  wire:model="file" type="file" id="file" >
                                                    @error('file')
                                                    <div class="mt-3 text-danger">* {{$message}}</div>
                                                    @enderror

                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">
                                                        File Upload</label>

                                                    <div class="col-sm-8">
                                                        <input class="form-control" wire:model="file" type="file"
                                                            id="file">
                                                        @error('file')
                                                            <div class="mt-3 text-danger">* {{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="text-center mt-5">
                                                    <button type="submit" class="btn btn-primary"
                                                        style="float:right;">Submit</button>
                                                    <button type="reset" wire:click="resetForm"
                                                        class="btn btn-secondary"
                                                        style="float:right; margin-right: 12px;">Reset</button>
                                                </div>
                                            </form><!-- End Horizontal Form -->

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

        @endif
    </main>

</div>
