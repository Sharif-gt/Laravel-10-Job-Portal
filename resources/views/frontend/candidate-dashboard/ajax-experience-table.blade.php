@foreach ($candidateExperience as $experience)
    <tr>
        <th>{{ $experience?->company }}</th>
        <td>{{ $experience?->department }}</td>
        <td>{{ $experience?->designation }}</td>
        <td>{{ $experience?->start }} /
            {{ $experience?->currently_working === 1 ? 'Currently working' : $experience?->end }}
        </td>
        <td>
            <a href="{{ route('candidate.add-experience.edit', $experience?->id) }}"
                class="btn btn-primary editExperience" data-bs-toggle="modal" data-bs-target="#experienceEditModel"><i
                    class="fas fa-edit"></i></a>
            <a href="{{ route('candidate.add-experience.destroy', $experience?->id) }}"
                class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>
@endforeach
