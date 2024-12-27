@php
use Carbon\Carbon;
@endphp

<x-app-layout>
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 align-items-center">
                    <h5 class="card-title">Income Statement</h5>
                    <a href="{{ route('income-statement.pdf', ['month' => $month, 'year' => $year, 'salary_debit' => $salaryDebit]) }}" id="download-pdf" class="btn btn-success">
                        Download PDF
                    </a>
                </div>

                <!-- Filter by Month and Year -->
                <form action="{{ route('income-statement') }}" method="GET" class="mb-4">
                    <div class="d-flex">
                        <select name="month" class="form-select mx-2" aria-label="Select Month">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $month == $i ? 'selected' : '' }}>{{ Carbon::create()->month($i)->format('F') }}</option>
                            @endfor
                        </select>

                        <select name="year" class="form-select mx-2" aria-label="Select Year">
                            <option value="{{ Carbon::now()->year }}" {{ $year == Carbon::now()->year ? 'selected' : '' }}>{{ Carbon::now()->year }}</option>
                            @for ($i = 1; $i <= 2; $i++)
                                <option value="{{ Carbon::now()->year - $i }}" {{ $year == Carbon::now()->year - $i ? 'selected' : '' }}>{{ Carbon::now()->year - $i }}</option>
                            @endfor
                        </select>

                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>

                <form action="{{ route('income-statement') }}" method="GET">
                    <input type="hidden" id="salary_debit_input" name="salary_debit" value="{{ $salaryDebit }}">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Income Statement Table -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Description</th>
                                                <th scope="col">Debit</th>
                                                <th scope="col">Credit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Revenue:</th>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Sales Revenue</td>
                                                <td></td>
                                                <td id="sales-revenue">{{ $salesRevenue }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Expenses:</th>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Inventory Materials</td>
                                                <td id="inventory-materials">{{ $inventoryMaterials }}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Salaries Expense</td>
                                                <td contenteditable="true" id="salary-debit">{{ $salaryDebit }}</td>
                                                <td id="salary-credit">{{ $salaryCredit }}</td>
                                            </tr>
                                            <tr>
                                                <th>Net Income</th>
                                                <td></td>
                                                <td id="net-income">{{ $netIncome }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Income Statement Table -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const salesRevenue = parseFloat(document.getElementById('sales-revenue').textContent) || 0;
            const inventoryMaterials = parseFloat(document.getElementById('inventory-materials').textContent) || 0;

            const salaryDebitField = document.getElementById('salary-debit');
            const salaryCredit = document.getElementById('salary-credit');
            const netIncome = document.getElementById('net-income');
            const salaryDebitInput = document.getElementById('salary_debit_input');

            // Update hidden input value whenever salary-debit is modified
            salaryDebitField.addEventListener('input', () => {
                salaryDebitInput.value = salaryDebitField.textContent.trim() || 0;
                updateSalaryCredit(); // Call to update the salary credit after input
            });

            function calculateNetIncome() {
                const credit = parseFloat(salaryCredit.textContent) || 0;
                const net = salesRevenue - credit;
                netIncome.textContent = net.toFixed(2);
            }

            function updateSalaryCredit() {
                const debit = parseFloat(salaryDebitField.textContent) || 0;
                const credit = debit + inventoryMaterials;
                salaryCredit.textContent = credit.toFixed(2);
                calculateNetIncome();
            }

            updateSalaryCredit();
        });

        document.addEventListener('DOMContentLoaded', () => {
        const downloadPdfLink = document.getElementById('download-pdf');
        const salaryDebitField = document.getElementById('salary-debit');

        downloadPdfLink.addEventListener('click', () => {
            const salaryDebit = salaryDebitField.textContent.trim() || 0;
            const currentUrl = "{{ route('income-statement.pdf', ['month' => $month, 'year' => $year]) }}";
            const updatedUrl = `${currentUrl}&salary_debit=${salaryDebit}`;
            window.location.href = updatedUrl;
        });
    });
    </script>
</x-app-layout>
