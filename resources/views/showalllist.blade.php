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
<div class="flex group bg-white shadow justify-end py-5">
    <button id="hovermenu" class = "bg-green-500 my-auto mr-10">Hello , {{auth()->user()->name}}<i class="ml-2 fa-solid fa-caret-down"></i></button>
            <!-- Dropdown -->
    <div id="hovermenuitems" class="block w-auto px-4 py-4 shadow-xl bg-white rounded-xl absolute right-11 top-16">
        <a href="{{route('showallist')}}">Dashboard</a>
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf

            <button type="submit" class="bg-red-500 full-width text-white  text-sm py-2 my-auto mr-11 hover:text-gray-900 hover:bg-red-300">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
    <!-- Dropdown -->
</div>
<!--Entire Menu-->
    <div class="mt-10 bg-slate-200 rounded-xl w-1/2 px-6 py-5 mx-auto">
        <div class="container">
        <h1 class="text-center mb-6"> Here is all of your list of expenses</h1>
            <div class="container text-lg font-bold text-center text-blue-500 underline mb-5">Your total expenses : {{$sumofexpenses}}</div>    
            <div class="flex flex-row">
                <div class="container text-sm mb-5 font-bold">Gas expenses : {{$sumofgas}}</div>
                <div class="container text-sm mb-5 font-bold">Food expenses : {{$sumoffood}}</div>
                <div class="container text-sm mb-5 font-bold">Bills expenses : {{$sumofbills}}</div>
                <div class="container text-sm mb-5 font-bold">Groceries expenses : {{$sumofgroceries}}</div>
            </div>
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
                    @if(count($showalllists))
                        @foreach($showalllists as $individuallist)
                            <tr>
                                <td>{{$individuallist->categorystring}}</td>
                                <td>{{$individuallist->content}}</td>
                                <td>{{$individuallist->amount}} </td>
                                <td class="table-auto"><form class="inline-block" action="{{route('destroy',$individuallist->id)}}" method="POST">
                                    @csrf @method('delete')
                                    <button class="bg-red-500 my-auto" type="submit"><i class="fa-solid fa-trash fa-sm"></i></button></form>
                                </td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <a href="{{route ('index')}}"><button class="w-full mt-10">Go back to home</button> </a>
            </div>
    </div>
</body>
<script>
    // Hovering scripts for menu
    $(document).ready(function(){
        $('#hovermenuitems').hide();
        $('#hovermenu').on('click',function(){
            $('#hovermenuitems').fadeToggle(250);
            if(($('#hovermenuitems').is(':hover')&& $('#hovermenu').is(':hover'))){
                $('#hovermenuitems').fadeToggle(250);
            }
            
        });
    });
</script>
</html>