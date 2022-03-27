<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Requisition and Issue Slip</title>
  <style type="text/css">
    table {
      width: 100%;
      border: 1px solid black;
    }

    table td,
    table th {
      border: 1px solid black;
    }

    .center {
      text-align: center;
      margin: 2rem;
    }

    .left {
      text-align: left;
    }

    .table-header {
      font-style: italic;
    }

    .table-footer {
      margin-top: 25px;
    }

    .page_break {
      page-break-before: always;
    }
  </style>
</head>

<body>
  <div class="center">
    <h3>REQUISITION AND ISSUE SLIP</h3>
  </div>

  <table cellpadding="0" cellspacing="0">
    <colgroup>
      <col />
    </colgroup>
    <thead>

      <tr>
        <th colspan="8" class="left">
          <p>Devision: {{ $requisitions[0]->devision }}</p>
          <p>Office: {{ $requisitions[0]->office }}</p>
        </th>
      </tr>

      <tr class="table-header">
        <th colspan="4">Requisition</th>
        <th colspan="2">Stock Available?</th>
        <th colspan="2">Issue</th>
      </tr>

    </thead>
    <tbody>
      <tr>
        <th>Stock No.</th>
        <th>Unit</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Yes</th>
        <th>No</th>
        <th>Quantity</th>
        <th>Remarks</th>
      </tr>
    </tbody>
    <tbody>

      @foreach ($requisitions as $requisition)
      <tr>
        <td class="center">{{ $requisition->inventory_id }}</td>
        <td class="center">{{ $requisition->unit->unit }}</td>
        <td class="center">{{ $requisition->unit->description }}</td>
        <td class="center">{{ $requisition->quantity }}</td>
        <td class="center">{{ $requisition->status }}</td>
        <td class="center">{{ $requisition->available }}</td>
        <td class="center">{{ $requisition->quantity }}</td>
        <td class="center">{{ $requisition->remarks }}</td>
      </tr>
      @endforeach

      <tr>
        <td> &nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>&nbsp; </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>&nbsp; </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

      </tr>
      <tr>
        <td>&nbsp; </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <th colspan="8" class="left">
          <p>Purposes: {{ $requisitions[0]->purpose }}</p>
        </th>
      </tr>

      <tr class="table-header">
        <th colspan="1">&nbsp;</th>
        <th colspan="1">Requested By:</th>
        <th colspan="2">Approved By:</th>
        <th colspan="2">Issued By:</th>
        <th colspan="2">Recieved By:</th>
      </tr>

      <tr>
        <td colspan="1">Signature</td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="1">Printed Name</td>
        <td colspan="1" class="center">{{ $requisitions[0]->requested->full_name }}</td>
        <td colspan="2" class="center">{{ $requisitions[0]->approved->full_name }}</td>
        <td colspan="2" class="center">{{ auth()->user()->full_name }}</td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="1">Designation</td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="1">Date</td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
    </tbody>
  </table>

  <div class="page_break"></div>

  <div class="center">
    <h3>PROPERTY ACKNOWLEDGEMENT RECIEPT</h3>
  </div>

  <table cellpadding="0" cellspacing="0">
    <colgroup>
      <col />
    </colgroup>
    {{-- <thead>

      <tr>
        <th colspan="8" class="left">
          <p>Devision: {{ $requisitions[0]->devision }}</p>
          <p>Office: {{ $requisitions[0]->office }}</p>
        </th>
      </tr>

      <tr class="table-header">
        <th colspan="4">Requisition</th>
        <th colspan="2">Stock Available?</th>
        <th colspan="2">Issue</th>
      </tr>

    </thead> --}}
    <tbody>
      <tr>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Description</th>
        <th>Property Number</th>
        <th>Date Acquired</th>
        <th>Amount</th>
      </tr>
    </tbody>
    <tbody>

      @foreach ($requisitions as $requisition)
      <tr>
        <td class="center">{{ $requisition->inventory_id }}</td>
        <td class="center">{{ $requisition->unit->unit }}</td>
        <td class="center">{{ $requisition->unit->description }}</td>
        <td class="center">{{ $requisition->quantity }}</td>
        <td class="center">{{ $requisition->status }}</td>
        <td class="center">{{ $requisition->available }}</td>

      </tr>
      @endforeach

      <tr>
        <td> &nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

      </tr>

      <tr>
        <td>&nbsp; </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

      </tr>

      <tr>
        <td>&nbsp; </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>


      </tr>

      <tr class="table-header">
        <th colspan="1">&nbsp;</th>
        <th colspan="1">Requested By:</th>
        <th colspan="2">Approved By:</th>
        <th colspan="2">Issued By:</th>
        <th colspan="2">Recieved By:</th>
      </tr>

      <tr>
        <td colspan="1">Signature</td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="1">Printed Name</td>
        <td colspan="1" class="center">{{ $requisitions[0]->requested->full_name }}</td>
        <td colspan="2" class="center">{{ $requisitions[0]->approved->full_name }}</td>
        <td colspan="2" class="center">{{ auth()->user()->full_name }}</td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="1">Designation</td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="1">Date</td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
    </tbody>
  </table>
</body>

</html>