@extends('layouts.app')

@section('content')
<div class="container appointment-container">
    <h1 class="center-align appointment-title">Available Appointments</h1>
    
    <div class="row appointment-grid">
        @foreach($appointments as $appointment)
            <div class="col s12 m6 l3 xl2 appointment-card">
                <div class="card">
                    <div class="card-content">
                        <div class="date-header">
                            <span class="card-title">{{$appointment['date']}}</span>
                            <p class="day-name">{{$appointment['day_name']}}</p>
                        </div>
                        
                        <div class="divider"></div>
                        
                        @if(!$appointment['off'])
                            @if(count($appointment['available_hours']) > 0)
                                <div class="time-slots grid grid-cols-4 gap-2">
                                    @foreach($appointment['business_hours'] as $time)
                                        @if (!in_array($time, $appointment['reserved_hours']))
                                            <form action="{{ route('reserve') }}" method="post" class="time-slot-form">
                                                @csrf
                                                <input type="hidden" name="patient_id" value="{{ $patient->id }}"> 
                                                <input type="hidden" name="date" value="{{ $appointment['full_date'] }}"> <!-- Full date -->
                                                <input type="hidden" name="time" value="{{ $time }}">
                                                <button class="waves-effect waves-light btn time-slot available" type="submit">
                                                    {{ $time }}
                                                </button>
                                            </form>
                                        @else
                                            <button class="waves-effect waves-light btn time-slot unavailable" disabled>
                                                {{ $time }}
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div class="no-slots">
                                    <p>No available appointments</p>
                                </div>
                            @endif
                        @else
                            <div class="closed-day">
                                <p>Closed on this day</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .appointment-container {
        padding: 20px 0;
    }
    
    .appointment-title {
        color: #26a69a;
        font-weight: 300;
        margin-bottom: 30px;
        padding:1rem;
    }
    
    .appointment-grid {
        display: flex;
        flex-wrap: wrap;
    }
    
    .appointment-card {
        margin-bottom: 20px;
        display: flex;
    }
    
    .appointment-card .card {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .appointment-card .card-content {
        flex: 1;
        padding: 15px;
    }
    
    .date-header {
        text-align: center;
        padding-bottom: 10px;
    }
    
    .date-header .card-title {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 500;
        color: #26a69a;
    }
    
    .day-name {
        margin: 0;
        font-weight: bold;
        color: #555;
    }
    
    .divider {
        margin: 10px 0;
    }
    
    .time-slots {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        padding-top: 10px;
    }
    
    .time-slot {
        border-radius: 4px;
        text-align: center;
        margin: 0;
        box-shadow: none;
    }
    
    .time-slot.available {
        background-color: #26a69a;
        padding: 0 0.8rem;
    }
    
    .time-slot.available:hover {
        background-color: #2bbbad;
    }
    
    .time-slot.unavailable {
        background-color: #9e9e9e;
    }
    
    .no-slots p, .closed-day p {
        text-align: center;
        color: #9e9e9e;
        padding: 15px 0;
        font-style: italic;
    }
    
    .closed-day p {
        color: #ef5350;
    }
    
    .time-slot-form {
        margin: 0;
    }
    

    @media only screen and (max-width: 600px) {
        .appointment-card {
            padding: 0 5px;
        }
        
        .time-slots {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elems, {
            twelveHour: false
        });
        
     
        const availableButtons = document.querySelectorAll('.time-slot.available');
        availableButtons.forEach(button => {
            button.addEventListener('mouseover', function() {
                this.classList.add('pulse');
            });
            button.addEventListener('mouseout', function() {
                this.classList.remove('pulse');
            });
        });
    });
</script>
@endsection
