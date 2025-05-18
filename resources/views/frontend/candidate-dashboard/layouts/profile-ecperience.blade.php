<div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
    <!--Experience section-->
    <div class="d-flex justify-content-between mt-1">
        <h4>Experience</h4>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#experienceModel">Add Experience</button>
    </div>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Company</th>
                <th>Depertment</th>
                <th>Designation</th>
                <th>Period</th>
                <th style="width: 20%">Action</th>
            </tr>
        </thead>
        <tbody class="experience-tbody">
            @forelse ($candidateExperience as $experience)
                <tr>
                    <th>{{ $experience?->company }}</th>
                    <td>{{ $experience?->department }}</td>
                    <td>{{ $experience?->designation }}</td>
                    <td>{{ $experience?->start }} /
                        {{ $experience?->currently_working === 1 ? 'Currently working' : $experience?->end }}
                    </td>
                    <td>
                        <a href="{{ route('candidate.add-experience.edit', $experience?->id) }}"
                            class="btn btn-primary editExperience" data-bs-toggle="modal"
                            data-bs-target="#experienceEditModel"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('candidate.add-experience.destroy', $experience?->id) }}"
                            class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!--Education section-->
    <div class="d-flex justify-content-between" style="margin-top: 70px">
        <h4>Education</h4>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#educationModel">Add Education</button>
    </div>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Level</th>
                <th>Degree</th>
                <th>Year</th>
                <th style="width: 20%">Action</th>
            </tr>
        </thead>
        <tbody class="education-tbody">
            @forelse ($candidateEducation as $education)
                <tr>
                    <th>{{ $education?->level }}</th>
                    <td>{{ $education?->degree }}</td>
                    <td>{{ $education?->year }}</td>
                    <td>
                        <a href="{{ route('candidate.add-education.edit', $education?->id) }}"
                            class="btn btn-primary editEducation" data-bs-toggle="modal"
                            data-bs-target="#educationEditModel"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('candidate.add-education.destroy', $education?->id) }}"
                            class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
