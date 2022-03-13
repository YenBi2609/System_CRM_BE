<div>
   <h2>{{ $data['type'] }}</h2>
   <p>{{ $data['content'] }} - Team 13</p>
   <h1 style="color:#20c997;">Welcomes to KOURSES</h1>
   <h3>Your course: {{ $data['productName'] }}</h3>
   <h3>Total: {{ number_format($data['orderPrice']) }}</h3>
   <h3>Days: 2 & 4 & 6</h3>
   <h3>Time: 6 pm</h3>
</div>