@include('Main')

<body>
    <div class="container-loan" style="padding-top: 85px;width: 70%;margin: auto;">
        <div class="title"><h3 style="text-align: center;">Loan Details List</h3></div>
        <table class="table caption-top" id="LoanDetailsList" style="width:100%;">
            <caption>List of users</caption>
            <thead>
                <tr>
                <th scope="col">S.No</th>
                <th scope="col">Loan Code</th>
                <th scope="col">Loan Applicant Name</th>
                <th scope="col">Mobile No</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $rowNumber = 1;
                @endphp
                @foreach($psLoanDetails as $psLoanDetail)
                    <tr>
                        <td>{{ $rowNumber}}</td>
                        <td>{{ $psLoanDetail->lbc_loan_code }}</td>
                        <td>{{ $psLoanDetail->user_name }}</td>
                        <td>{{ $psLoanDetail->contact_no }}</td>
                        <td>{{ $psLoanDetail->email }}</td>
                        <td><button type="button" class="btn btn-info" onclick="SendEmail({{$psLoanDetail->lbc_loan_id}})">Send Email</button></td>
                    </tr>
                    @php
                        $rowNumber++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        new DataTable('#LoanDetailsList');

        function SendEmail(rsEmailId){
            alert(rsEmailId);

        }

    </script>
</body>
