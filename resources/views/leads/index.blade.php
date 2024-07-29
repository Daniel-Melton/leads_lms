@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Leads</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLeadModal">
        Add New Lead
    </button>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Created Date</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Source</th>
            <th>Agent</th>
        </tr>
    </thead>
    <tbody>
        @foreach($leads as $lead)
        <tr>
            <td>{{ $lead->created_at->format('Y-m-d') }}</td>
            <td>
                <a href="#" class="lead-details" data-bs-toggle="offcanvas" data-bs-target="#leadDetailsOffcanvas" data-lead-id="{{ $lead->id }}">
                    {{ $lead->full_name }}
                </a>
            </td>
            <td>{{ $lead->phone }}</td>
            <td>{{ $lead->status->name }}</td>
            <td>{{ $lead->source }}</td>
            <td>{{ $lead->agent->name ?? 'Unassigned' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('leads.partials.add-modal')
@include('leads.partials.details-offcanvas')
@endsection

@push('scripts')
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const leadLinks = document.querySelectorAll('.lead-details');
        const leadDetailsForm = document.getElementById('leadDetailsForm');
        const offcanvas = document.getElementById('leadDetailsOffcanvas');
        const mainContent = document.querySelector('main');
        
        leadLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const leadId = this.getAttribute('data-lead-id');
                fetchLeadDetails(leadId);
            });
        });

        leadDetailsForm.addEventListener('submit', function(e) {
            e.preventDefault();
            updateLeadDetails();
        });

        function fetchLeadDetails(leadId) {
            fetch(`/leads/${leadId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('lead_full_name').value = data.full_name;
                    document.getElementById('lead_country').value = data.country;
                    document.getElementById('lead_time_zone').value = data.time_zone;
                    document.getElementById('lead_gender').value = data.gender;
                    document.getElementById('lead_email').value = data.email;
                    document.getElementById('lead_phone').value = data.phone;
                    document.getElementById('lead_status').value = data.status_id;
                    document.getElementById('lead_source').value = data.source;
                    document.getElementById('lead_agent').value = data.agent ? data.agent.name : 'Unassigned';
                    document.getElementById('lead_reminder').value = data.reminder_at;
                    document.getElementById('lead_note').value = data.note;
                    leadDetailsForm.action = `/leads/${leadId}`;
                });
        }

        function updateLeadDetails() {
            const formData = new FormData(leadDetailsForm);
            fetch(leadDetailsForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload(); // Reload the page to reflect changes
            });
        }

        // Shrink main content when off-canvas is shown
        offcanvas.addEventListener('show.bs.offcanvas', function () {
            mainContent.style.marginRight = '400px'; // Adjust this value as needed
            mainContent.style.transition = 'margin-right 0.3s ease-in-out';
        });

        // Restore main content when off-canvas is hidden
        offcanvas.addEventListener('hide.bs.offcanvas', function () {
            mainContent.style.marginRight = '0';
        });
    });
</script>
@endpush