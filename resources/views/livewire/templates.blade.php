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
            <div class="pageTitle">
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
                                    <th>#</th>
                                    <th>State</th>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>With Watermark</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($templateCollection as $key => $template)
                                {{-- {{$template->images->thumbnail}} --}}
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="text-uppercase">{{ $template->state }}</td>
                                        <td class="text-uppercase">{{ $template->type }}</td>
                                        <td>{{ $template->name }}</td>
                                        <td>
                                            <a href="{{ asset($template->images->file ?? '') }}" target="blank">
                                                @if (!empty($template->images->file_type))
                                                    @if ($template->images->file_type != 'pdf')
                                                        <img width="200px" height="150px"
                                                            src="{{ $template->images->file ?? '' }}" />
                                                    @else
                                                        <i class="fa fa-file-pdf-o"
                                                            style="font-size:48px;color:red"></i>
                                                    @endif
                                                @endif
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ asset($template->images->thumbnail ?? '') }}" target="blank">
                                                @if (!empty($template->images->file_type))
                                                    @if ($template->images->file_type != 'pdf')
                                                        <img width="200px" height="150px"
                                                            src="{{ $template->images->thumbnail ?? '' }}" />
                                                    @else
                                                        <i class="fa fa-file-pdf-o"
                                                            style="font-size:48px;color:red"></i>
                                                    @endif
                                                @endif
                                            </a>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"
                                                    wire:click="changeStatus({{ $template->id }})" type="checkbox"
                                                    role="switch" id="flexSwitchCheckChecked_{{ $key }}"
                                                    {{ $template->status == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="flexSwitchCheckChecked_{{ $key }}"></label>
                                            </div>
                                        </td>
                                        <td><button type="button" class="btn btn-primary"
                                                wire:click="editTemplate({{ $template->id }})">Edit</button>
                                            @if ($confirming === $template->id)
                                                <button wire:click="deleteTemplate({{ $template->id }})"
                                                    class="btn btn-warning text-white w-32 ">Sure?</button>
                                            @else
                                                <button wire:click="confirmDelete({{ $template->id }})"
                                                    class="btn btn-danger">Delete</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        @else
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
                                                    <label class="col-sm-3 col-form-label">State</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-select" aria-label="Default select example"
                                                            type="text" wire:model="state">
                                                            <option selected="">Open this select State</option>
                                                            <option value="usa">USA</option>
                                                            <option value="canada">CANADA</option>
                                                            <option value="uk">UK</option>
                                                            <option value="global">GLOBAL</option>
                                                        </select>
                                                        @error('state')
                                                            <div class="mt-3 text-danger">* {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Type</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-select" aria-label="Default select example"
                                                            type="text" wire:model="type">
                                                            <option selected="">Open this select Type</option>
                                                            <option value="basic">BASIC</option>
                                                            <option value="advance">ADVANCE</option>
                                                        </select>
                                                        @error('type')
                                                            <div class="mt-3 text-danger">* {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

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
                                                    <label class="col-sm-3 col-form-label">File Upload</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" wire:model="image" type="file"
                                                            id="image">
                                                        {{-- @if ($image)
                                                            <img src="{{ $image->temporaryUrl() }}" width="60">
                                                        @endif --}}
                                                        @error('image')
                                                            <div class="mt-3 text-danger">* {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">File With Watermark</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" wire:model="watermark" type="file"
                                                            id="watermark">
                                                        {{-- @if ($watermark)
                                                            <img src="{{ $watermark->temporaryUrl() }}" width="60">
                                                        @endif --}}
                                                        @error('watermark')
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
