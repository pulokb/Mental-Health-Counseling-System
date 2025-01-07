<!-- Print Button -->
<div class="form-group">
    <button onclick="printSection()" class="btn btn-primary">Print</button>
</div>

<!-- Content to Print -->
<div id="printable-section">
    <!-- User Name Field -->
    <h4 class="">Summary Case For {{ $doctorFeedback->user_name }} </h4>
    <div class="form-group">
        <b>{!! Form::label('user_name', __('Name')) !!}</b>
        <p>{{ $doctorFeedback->user_name }}</p>
    </div>

    <!-- Age Field -->
    <div class="form-group">
        <b>{!! Form::label('age', __('Age')) !!}</b>
        <p>{{ $doctorFeedback->age }}</p>
    </div>

    <!-- Gender Field -->
    <div class="form-group">
        <b>{!! Form::label('gender', __('Gender')) !!}</b>
        <p>{{ $doctorFeedback->gender }}</p>
    </div>

    <!-- Occupation Field -->
    <div class="form-group">
        <b>{!! Form::label('occupation', __('Occupation')) !!}</b>
        <p>{{ $doctorFeedback->occupation }}</p>
    </div>

    <!-- Address Field -->
    <div class="form-group">
        <b>{!! Form::label('address', __('Location')) !!}</b>
        <p>{{ $doctorFeedback->address }}</p>
    </div>

    <!-- Overall Result Field -->
    <div class="form-group">
        <b>{!! Form::label('overall_result', __('Overall Result')) !!}</b>
        <p>{{ $doctorFeedback->overall_result }}</p>
    </div>

    <!-- Overall Status Field -->
    <div class="form-group">
        <b
            style="color:
            {{ $doctorFeedback->status == 'Good'
                ? 'black'
                : ($doctorFeedback->status == 'Moderate'
                    ? 'green'
                    : ($doctorFeedback->status == 'Weak'
                        ? 'red'
                        : 'black')) }}">
            {!! Form::label('status', __('Overall Status')) !!}
        </b>
        <p>{{ $doctorFeedback->status }}</p>
    </div>


    <div class="form-group">
        <b
            style="color:
        {{ $doctorFeedback->depression == 25
            ? 'black'
            : ($doctorFeedback->depression == 50
                ? 'green'
                : ($doctorFeedback->depression == 75
                    ? 'red'
                    : 'black')) }}">
            {!! Form::label(
                'depression',
                __('1. Depression (Feelings of persistent sadness and lack of interest in daily activities)'),
            ) !!}
        </b>
        <p>{{ $doctorFeedback->depression }}</p>
    </div>

    <div class="form-group">
        <b
            style="color:
        {{ $doctorFeedback->anxiety == 25
            ? 'black'
            : ($doctorFeedback->anxiety == 50
                ? 'green'
                : ($doctorFeedback->anxiety == 75
                    ? 'red'
                    : 'black')) }}">
            {!! Form::label(
                'anxiety',
                __('2. Anxiety (Excessive worry, fear, and tension that interferes with daily functioning)'),
            ) !!}
        </b>
        <p>{{ $doctorFeedback->anxiety }}</p>
    </div>

    <div class="form-group">
        <b
            style="color:
        {{ $doctorFeedback->irritability == 25
            ? 'black'
            : ($doctorFeedback->irritability == 50
                ? 'green'
                : ($doctorFeedback->irritability == 75
                    ? 'red'
                    : 'black')) }}">
            {!! Form::label(
                'irritability',
                __('3. Irritability (Being easily frustrated or angered, often leading to conflict in relationships)'),
            ) !!}
        </b>
        <p>{{ $doctorFeedback->irritability }}</p>
    </div>

    <div class="form-group">
        <b
            style="color:
        {{ $doctorFeedback->emotional == 25
            ? 'black'
            : ($doctorFeedback->emotional == 50
                ? 'green'
                : ($doctorFeedback->emotional == 75
                    ? 'red'
                    : 'black')) }}">
            {!! Form::label(
                'emotional',
                __('4. Emotional Dysregulation (Difficulty controlling emotional responses, leading to extreme reactions)'),
            ) !!}
        </b>
        <p>{{ $doctorFeedback->emotional }}</p>
    </div>

    <div class="form-group">
        <b
            style="color:
        {{ $doctorFeedback->social == 25
            ? 'black'
            : ($doctorFeedback->social == 50
                ? 'green'
                : ($doctorFeedback->social == 75
                    ? 'red'
                    : 'black')) }}">
            {!! Form::label(
                'social',
                __('5. Social Withdrawal (Avoiding social interactions and isolating oneself from friends and family)'),
            ) !!}
        </b>
        <p>{{ $doctorFeedback->social }}</p>
    </div>

    <div class="form-group">
        <b
            style="color:
        {{ $doctorFeedback->fatigue == 25
            ? 'black'
            : ($doctorFeedback->fatigue == 50
                ? 'green'
                : ($doctorFeedback->fatigue == 75
                    ? 'red'
                    : 'black')) }}">
            {!! Form::label('fatigue', __('6. Fatigue (Persistent tiredness that is not relieved by rest or sleep)')) !!}
        </b>
        <p>{{ $doctorFeedback->fatigue }}</p>
    </div>

    <div class="form-group">
        <b
            style="color:
        {{ $doctorFeedback->concentrating == 25
            ? 'black'
            : ($doctorFeedback->concentrating == 50
                ? 'green'
                : ($doctorFeedback->concentrating == 75
                    ? 'red'
                    : 'black')) }}">
            {!! Form::label(
                'concentrating',
                __('7. Difficulty Concentrating (Trouble focusing on tasks or maintaining attention)'),
            ) !!}
        </b>
        <p>{{ $doctorFeedback->concentrating }}</p>
    </div>

    <div class="form-group">
        <b
            style="color:
        {{ $doctorFeedback->sleep == 25
            ? 'black'
            : ($doctorFeedback->sleep == 50
                ? 'green'
                : ($doctorFeedback->sleep == 75
                    ? 'red'
                    : 'black')) }}">
            {!! Form::label('sleep', __('8. Sleep Disturbances (Experiencing insomnia or excessive sleep)')) !!}
        </b>
        <p>{{ $doctorFeedback->sleep }}</p>
    </div>

    <div class="form-group">
        <b
            style="color:
        {{ $doctorFeedback->esteem == 25
            ? 'black'
            : ($doctorFeedback->esteem == 50
                ? 'green'
                : ($doctorFeedback->esteem == 75
                    ? 'red'
                    : 'black')) }}">
            {!! Form::label(
                'esteem',
                __('9. Low Self-Esteem (Persistent negative thoughts about oneself and feelings of inadequacy)'),
            ) !!}
        </b>
        <p>{{ $doctorFeedback->esteem }}</p>
    </div>

    <div class="form-group">
        <b
            style="color:
        {{ $doctorFeedback->panic == 25
            ? 'black'
            : ($doctorFeedback->panic == 50
                ? 'green'
                : ($doctorFeedback->panic == 75
                    ? 'red'
                    : 'black')) }}">
            {!! Form::label(
                'panic',
                __('10. Panic Attacks (Sudden episodes of intense fear, accompanied by physical symptoms like rapid heartbeat)'),
            ) !!}
        </b>
        <p>{{ $doctorFeedback->panic }}</p>
    </div>


    <!-- Message Field -->
    <div class="form-group">
        <b>{!! Form::label('message', __('Message')) !!}</b>
        <p>{{ $doctorFeedback->message }}</p>
    </div>

    <!-- Symptoms Field -->
    <div class="form-group">
        <b>{!! Form::label('symptoms', __('Symptoms')) !!}</b>
        <p>{{ $doctorFeedback->symptoms }}</p>
    </div>

    <!-- Suggestions Field -->
    <div class="form-group">
        <b>{!! Form::label('suggestions', __('Suggestions')) !!}</b>
        <p>{{ $doctorFeedback->suggestions }}</p>
    </div>

    <!-- Note Field -->
    <div class="form-group">
        <b>{!! Form::label('note', __('Note')) !!}</b>
        <p>{{ $doctorFeedback->note }}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group">
        <b>{!! Form::label('created_at', __('Created At')) !!}</b>
        <p>{{ $doctorFeedback->created_at }}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group">
        <b>{!! Form::label('updated_at', __('Updated At')) !!}</b>
        <p>{{ $doctorFeedback->updated_at }}</p>
    </div>
</div>



<script>
    function printSection() {
    var printContent = document.getElementById('printable-section').innerHTML;

    // Add the "Printed on" text
    var currentDate = new Date();
    var dateText =
        "<p style='text-align: center; font-weight: bold; color: blue;'>Report By MindQuilo Printed on " +
        currentDate.toLocaleDateString() + "</p>";

    // Combine the date text with the print content
    var combinedContent = dateText + printContent;

    // Create a temporary iframe
    var printWindow = window.open('', '_blank', 'width=800,height=600');
    printWindow.document.open();
    printWindow.document.write(`
        <html>
            <head>
                <title>Summary Case Report {{ $doctorFeedback->user_name }}</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 20px;
                    }
                </style>
            </head>
            <body>${combinedContent}</body>
        </html>
    `);
    printWindow.document.close();

    // Trigger the print dialog
    printWindow.print();

    // Close the print window after printing
    printWindow.onafterprint = function () {
        printWindow.close();
    };
}
</script>
