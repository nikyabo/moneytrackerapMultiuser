<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/19d82403b1.js" crossorigin="anonymous"></script><!-- font awesome -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  @vite('resources/css/app.css')
</head>

<body class="bg-white">
    <!-- Logout -->

<div class="flex bg-white shadow justify-end">
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="underline text-sm py-5 my-auto mr-11 text-gray-600 hover:text-gray-900">
            {{ __('Log Out') }}
        </button>
    </form>
</div>

<!-- Logout -->
    <div class="mt-10 bg-slate-200 rounded-xl w-1/2 px-6 py-5 mx-auto">
        <h1 class="text-center mb-10">MoneyTracker App</h1>
        <div class="container">
            <form class="flex flex-row gap-4" action="{{route('store')}}" method="POST" autocomplete="off">
               @csrf
                <div class="w-full">
                    <label for="Category" class="font-bold">Category</label>
                    <input readonly type="text" id="dropdown" class="placeholder:text-black cursor-pointer hover:bg-slate-800 hover:text-white duration-100 mt-2 bg-white w-full py-2 px-3 placeholder:pl-4 text-black text-left rounded" placeholder="Pick a category">
                    <input id="trueVal" type="hidden" name="category" value=""> 
                    <input type="hidden" name="category" value="{{ auth()->user()->id }}">
                    <input id="categorystrVal" type="hidden" name="categorystring" value="">
                    <!-- Will send a hidden value of each category-->
                </div>
                <div class="w-full">
                    <label for="ItemDescription" class="font-bold">Item Description</label>
                    <input type="text" name="content" class="mt-2 bg-white w-full py-2 px-3 placeholder:pl-4 placeholder:text-slate-400 rounded" placeholder="Item description" required>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" required>
                </div>
                <div class="w-full">
                    <label for="Amount" class="font-bold">Amount</label>
                    <input type="text" name="amount" class="mt-2 bg-white w-full py-2 px-3 placeholder:pl-4 placeholder:text-slate-400 rounded" placeholder="Enter Amount" required>
                </div>
                <div>
                    <label for="Add" class="font-bold">Add</label>
                    <button class="bg-blue-600" type="submit">Add</button>
                </div>
                </div>
            </form>
        </div>
    </div>
<!-- Exclude  -->
    <div id="dropdownitems" class="absolute bg-white shadow" style="width:261.533px;">
        <ul>
            <li id="dropdownID1" class="hover:bg-slate-300 duration-100 px-5 py-2"><a href="#">1. Gas</a></li>
            <li id="dropdownID2" class="hover:bg-slate-300 duration-100 px-5 py-2"><a href="#">2. Food</a></li>
            <li id="dropdownID3" class="hover:bg-slate-300 duration-100 px-5 py-2"><a href="#">3. Bills</a></li>
            <li id="dropdownID4" class="hover:bg-slate-300 duration-100 px-5 py-2"><a href="#">4. Groceries</a></li>
        </ul>
    </div>
<!-- Exclude  -->
    <div class="mt-10 bg-slate-200 rounded-xl w-1/2 px-6 py-4 mx-auto">
        <h1 class="text-center mb-10">Your expenses list</h1>
            <div class="container text-lg font-bold text-center text-blue-500 underline mb-5">Your total expenses : {{$sumofexpenses}}</div>    
            <div class="flex flex-row">
                <div class="container text-sm mb-5 font-bold">Gas expenses : {{$sumofgas}}</div>
                <div class="container text-sm mb-5 font-bold">Food expenses : {{$sumoffood}}</div>
                <div class="container text-sm mb-5 font-bold">Bills expenses : {{$sumofbills}}</div>
                <div class="container text-sm mb-5 font-bold">Groceries expenses : {{$sumofgroceries}}</div>
            </div>
        <div class="container">
            <table class="w-full auto text-center">
                <thead class="bg-blue-900 text-white p-10">
                    <tr>
                        <th>Category</th>
                        <th>Item Description</th>
                        <th>Amount (PHP)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-blue-200">
                @if(count($moneytrackerapps))
                    @foreach($moneytrackerapps as $moneytrackerapp)
                        <tr>
                            <td>{{$moneytrackerapp->categorystring}}</td>
                            <td>{{$moneytrackerapp->content}}</td>
                            <td>{{$moneytrackerapp->amount}} </td>
                            <td class="table-auto"><form class="inline-block" action="{{route('destroy',$moneytrackerapp->id)}}" method="POST">
                                @csrf @method('delete')
                                <button class="bg-red-500 my-auto" type="submit"><i class="fa-solid fa-trash fa-sm"></i></button></form>
                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <a href="{{route ('showallist')}}"><button class="w-full mt-10">Show Dashboard Expenses Category</button> </a>
    </div>

    <div class="container absolute top-36 left-32">
        <form action="{{route('store')}}" method="POST">
            @csrf
            <h1>Auto input GAS</h1>
            <input id="randomnum" type="hidden" name="amount" value="">
            <input type="hidden" name="content" value="Some Item">
            <input type="hidden" name="category" value="1">
            <input type="hidden" name="categorystring" value="Gas">
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <button id="numbergenerator"class="px-4 py-2 bg-blue-500"type="submit">Fill random values</button>
        </form>
   </div>
</body>
<script>
    // Toggle function
    $(document).ready(function(){
        var widthValue2;
        var pos;
        
        $('#dropdownitems').hide();
        $('#dropdown').on('click',function(){
            widthValue2 = $('#dropdown').width();
            pos = $('#dropdown').position(); //instance
            $('#dropdownitems').css({'width':widthValue2+24});//getting dropdown dimensions
            $('#dropdownitems').css({'top':pos.top+63});//getting dropdown dimensions
            $('#dropdownitems').css({'left':pos.left});//getting dropdown dimensions
            $('#dropdownitems').fadeToggle().delay(50); //show hide toggling fade delay  50
        });

        $('#dropdownID1').on('click',function(){
            $('#dropdown').val('Gas');
            $('#trueVal').val('1');
            $('#categorystrVal').val("Gas");
            $('#dropdownitems').hide();
        });

        $('#dropdownID2').on('click',function(){
            $('#dropdown').val('Food');
            $('#categorystrVal').val('Food');
            $('#trueVal').val('2');
            $('#dropdownitems').hide();
        });

        $('#dropdownID3').on('click',function(){
            $('#dropdown').val('Bills');
            $('#categorystrVal').val('Bills');
            $('#trueVal').val('3');
            $('#dropdownitems').hide();
        });

        $('#dropdownID4').on('click',function(){
            $('#dropdown').val('Groceries');
            $('#categorystrVal').val('Groceries');
            $('#trueVal').val('4');
            $('#dropdownitems').hide();
        });
        // end here

        // TEST JS
        $('#numbergenerator').on('click',function(){
            var randomnum = Math.random()*100;
            $('#randomnum').val(randomnum);
        });
    });
</script>
</html>