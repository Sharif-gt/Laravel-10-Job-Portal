<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

    <form method="POST" action="{{ route('candidate.profile-details') }}">
        @csrf

        <div class="row">
            <!-- Gender -->
            <div class="col-md-6">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Gender *</label>
                    <select class="form-control form-icons select-active" name="gender">
                        <option value="">Select</option>
                        <option @selected($candidatesInfo?->gender === 'male') value="male">Male</option>
                        <option @selected($candidatesInfo?->gender === 'female') value="female">Female</option>
                    </select>

                    @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Marital Status -->
            <div class="col-md-6">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Marital Status</label>
                    <select class="form-control form-icons select-active" name="marital_status">
                        <option value="">Select</option>
                        <option @selected($candidatesInfo?->marital_status === 'married') value="married">Married</option>
                        <option @selected($candidatesInfo?->marital_status === 'single') value="single">Single</option>
                    </select>

                    @error('marital_status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Profession -->
            <div class="col-md-6">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Profession *</label>
                    <select class="form-control form-icons select-active" name="profession">
                        <option value="">select</option>
                        @foreach ($professions as $profession)
                            <option @selected($profession?->id === $candidatesInfo?->profession_id) value="{{ $profession?->id }}">{{ $profession?->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('profession')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Your Status -->
            <div class="col-md-6">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Your Status *</label>
                    <select class="form-control form-icons select-active" name="status">
                        <option value="">Select</option>
                        <option @selected($candidatesInfo?->status === 'available') value="available">Available</option>
                        <option @selected($candidatesInfo?->status === 'not_available') value="not_available">Not available</option>
                    </select>

                    @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Skill -->
            <div class="col-md-12">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Skills *</label>
                    <select class="form-control form-icons select-active" name="skills[]" multiple="">
                        <option value="">select</option>
                        @php
                            $candidateSkill = $candidatesInfo?->skill->pluck('skill_id')->toArray() ?? [];
                        @endphp
                        @foreach ($skills as $skill)
                            <option @selected(in_array($skill->id, $candidateSkill)) value="{{ $skill?->id }}">{{ $skill?->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Language -->
            <div class="col-md-12">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Language You Know *</label>
                    <select class="form-control form-icons select-active" name="languages[]" multiple="">
                        <option value="">select</option>
                        @php
                            $lan = $candidatesInfo?->language->pluck('language_id')->toArray() ?? [];
                        @endphp
                        @foreach ($languages as $language)
                            <option @selected(in_array($language->id, $lan)) value="{{ $language?->id }}">{{ $language?->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Bio -->
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Bio</label>
                        <textarea name="bio" id="editor" value="">{!! $candidatesInfo?->bio !!}</textarea>

                        @error('vision')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
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
