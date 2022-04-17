<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Requisition and Issue Slip</title>
  <style type="text/css">
    table {
      width: 100%;
      border: 1px solid black;
    }

    * {
      font-size: 14px !important;
      0
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

    .right {
      text-align: right;
      font-style: normal;
      font-size: 1.5rem;
    }

    .table-header {
      font-style: italic;
    }

    .table-footer {
      margin-top: 25px;
    }

    body {
      margin: 40px !important;
    }


    .img {
      width: 50px;
      display: block;
    }


    .txt-bold {
      font-weight: bold;
    }

    .txt-normal {
      font-weight: normal;
    }

    .page_break {
      page-break-after: always;
    }

    /* Centered text */
    .centered {
      position: absolute;
      top: 48%;
      left: 25%;
      transform: translate(-50%, -50%);
    }

    .container {
      position: relative;
      text-align: center;
      color: white;
    }
  </style>
</head>

<body>

  <div class="right">
    <p><i>Appendix 63</i></p>
  </div>
  <div class="center">
    <h3>REQUISITION AND ISSUE SLIP</h3>
  </div>

  <div>
    <p class="txt-bold">Entity Name : Gregorio Catenza National High
      School&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Fund Cluster :
      ____________________</p>
  </div>



  <table cellpadding="0" cellspacing="0" class="m-5">
    <colgroup>
      <col />
    </colgroup>
    <thead>

      <tr>
        <th colspan="5" class="left">
          <p>Devision: {{ $requisitions[0]->requesition->devision }}</p>
          <p>Office: {{ $requisitions[0]->requesition->office }}</p>
        </th>
        <th colspan="3" class="left text-md">
          <p>Responsibility Center Code : ______</p>
          <p>RIS No. : ______________________</p>
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
        <td class="center">{{ $requisition->unit->id }}</td>
        <td class="center">{{ $requisition->unit->unit }}</td>
        <td class="center">{{ $requisition->unit->description }}</td>
        <td class="center">{{ $requisition->quantity }}</td>
        <td class="center" style="font-family: DejaVu Sans, sans-serif;">✔</td>
        <td class="center"></td>
        <td class="center">{{ $requisition->quantity }}</td>
        <td class="center">{{ $requisition->requesition->remarks }}</td>
      </tr>
      @endforeach

      <tr>
        <td>&nbsp;</td>
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
          <p>Purposes: {{ $requisitions[0]->requesition->purpose }}</p>
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
        <td colspan="1" class="center"> <img src="{{ $image[0] }}" alt="Signature" class="img">
        </td>
        <td colspan="2" class="center"> <img src="{{ $image[1] }}" alt="Signature" class="img"></td>
        <td colspan="2" class="center"> <img src="{{ $image[2] }}" alt="Signature" class="img"></td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="1">Printed Name</td>
        <td colspan="1" class="center">{{ $requisitions[0]->requesition->requested->full_name }}</td>
        <td colspan="2" class="center">{{ $requisitions[0]->requesition->approved->full_name }}</td>
        <td colspan="2" class="center">{{ auth()->user()->full_name }}</td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="1">Designation</td>
        <td colspan="1" class="center">{{ $requisitions[0]->requesition->requested->position->description }}</td>
        <td colspan="2" class="center"> {{ $requisitions[0]->requesition->approved->position->description }}</td>
        <td colspan="2" class="center">Property Custodian</td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="1">Date</td>
        <td colspan="1" class="center">{{ $requisitions[0]->requesition->requested->created_at->toFormatedDate() }}
        </td>
        <td colspan="2" class="center">{{ $requisitions[0]->requesition->approved_date->toFormatedDate() }}
        </td>
        <td colspan="2" class="center">{{ now()->toFormatedDate() }}</td>
        <td colspan="2"></td>
      </tr>
    </tbody>
  </table>

  <div class="page_break"></div>

  <div class="right">
    <p><i>Appendix 59</i></p>
  </div>
  <div class="center">
    <h3>INVENTORY CUSTODIAN SLIP</h3>
  </div>

  <div>
    <p class="txt-bold">Entity Name : Gregorio Catenza National High
      School&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Fund Cluster :
      ____________________</p>
  </div>


  <table cellpadding="0" cellspacing="0">


    <tr>
      <th rowspan="2">Quantity</th>
      <th rowspan="2">Unit</th>
      <th colspan="2">Amount</th>
      <th rowspan="2">Description</th>
      <th rowspan="2">Inventory Item No.</th>
      <th rowspan="2">Estimated Useful Life</th>
    </tr>

    <tr>
      <th class="txt-normal">Unit Cost</th>
      <th class="txt-normal">Total Cost</th>
    </tr>

    <tbody>

      @foreach ($requisitions as $requisition)
      <tr>
        <td class="center">{{ $requisition->quantity }}</td>
        <td class="center">{{ $requisition->unit->unit }}</td>
        <td class="center">{{ $requisition->unit->amount }}</td>
        <td class="center">{{ $requisition->unit->amount * $requisition->quantity}}</td>
        <td class="center">{{ $requisition->unit->description }}</td>
        <td class="center">APR001</td>
        <td class="center">{{ $requisition->unit->life_span }}</td>
      </tr>
      @endforeach

      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

    </tbody>

    <thead>
      <tr>
        <th colspan="4">
          <div class="left">
            Received from:
          </div>
          <div class="center">
            <img class="centered" src="{{ $image[0] }}" alt="Signature" height="100" width="100">
            <p class="txt-normal">{{ auth()->user()->full_name }} <br>
              _______________________________<br>Signature Over Printed Name</p>

            <p class="txt-normal">{{ now()->toFormatedDate()}} <br>Date</p>
          </div>

        </th>

        <th colspan="3" class="text-md">
          <div class="left">
            Received by:
          </div>
          <div class="center">
            <p>Devision: {{ $requisitions[0]->requesition->devision }}</p>
            <p>Office: {{ $requisitions[0]->requesition->office }}</p>
          </div>
        </th>
      </tr>
    </thead>
  </table>
</body>

</html>