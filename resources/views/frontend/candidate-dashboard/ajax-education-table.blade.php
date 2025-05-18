@forelse ($candidateEducation as $education)
    <tr>
        <th>{{ $education?->level }}</th>
        <td>{{ $education?->degree }}</td>
        <td>{{ $education?->year }}</td>
        <td>
            <a href="{{ route('candidate.add-education.edit', $education?->id) }}" class="btn btn-primary editEducation"
                data-bs-toggle="modal" data-bs-target="#educationEditModel"><i class="fas fa-edit"></i></a>
            <a href="{{ route('candidate.add-education.destroy', $education?->id) }}"
                class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center">No Data Found</td>
    </tr>
@endforelse
