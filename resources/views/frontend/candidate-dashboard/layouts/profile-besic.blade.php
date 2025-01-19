<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

    <form method="POST" action="{{ route('candidate.profile-update') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <!-- Profile Picture -->
            <div class="col-md-6">
                <x-image-preview :height="200" :width="200" :source="$candidatesInfo?->image" />
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Profile Picture *</label>
                    <input class="form-control" name="image" type="file" value="">

                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- CV -->
            <div class="col-md-7">
                {{-- <x-image-preview :height="200" :width="300" :source="$companieInfo?->banner" /> --}}
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">CV</label>
                    <input class="form-control" name="cv" type="file" value="">

                    @error('cv')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Full Name -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Full Name *</label>
                    <input class="form-control" name="full_name" type="text"
                        value="{{ $candidatesInfo?->full_name }}">

                    @error('full_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Title -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Title</label>
                    <input class="form-control" name="title" type="text" value="{{ $candidatesInfo?->title }}">

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Experience Level -->
            <div class="col-md-4">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Experience Level *</label>
                    <select class="form-control country form-icons select-active" name="experience_level">
                        <option value="">Select</option>
                        @foreach ($experiences as $experience)
                            <option @selected($experience?->id === $candidatesInfo->experience_id) value="{{ $experience?->id }}">{{ $experience?->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('experience_level')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Website -->
            <div class="col-md-8">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Website</label>
                    <input class="form-control" name="website" type="text" value="{{ $candidatesInfo?->website }}">

                    @error('website')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Date of Birth -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Date of Birth *</label>
                    <input class="form-control datepicker" name="date_of_birth" type="text"
                        value="{{ $candidatesInfo?->birth_date }}" placeholder="yyyy/mm/dd">

                    @error('date_of_birth')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="row">
            <div class="box-button mt-15 col-md-4">
                <button type="submit" class="btn btn-apply-big font-md font-bold">Save All
                    Changes</button>
            </div>
        </div>
    </form>
</div>
