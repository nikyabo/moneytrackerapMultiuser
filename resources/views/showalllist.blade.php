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
    
    <div class="mt-10 bg-slate-200 rounded-xl w-1/2 px-6 py-5 mx-auto">
        <div class="container">
        <h1 class="text-center mb-6"> Here is your list of expenses</h1>
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
</html>