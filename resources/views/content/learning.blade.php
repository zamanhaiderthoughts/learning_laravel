@php
    $books = [
        [
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'year' => 1960,
        ],
        [
            'title' => '1984',
            'author' => 'George Orwell',
            'year' => 1949,
        ],
        [
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'year' => 1925,
        ],
    ];

    function filter(array $items, callable $callback)
    {
        $filteredItems = [];
        foreach ($items as $item) {
            if ($callback($item)) {
                $filteredItems[] = $item;
            }
        }
        return $filteredItems;
    }

    $filteredBooks = filter($books, function ($book) {
        return $book['year'] >= 1960;
    });
@endphp

@foreach ($filteredBooks as $items)
    <div class="book">
        <h2>{{ $items['title'] }}</h2>
        <p>Author: {{ $items['author'] }}</p>
        <p>Year: {{ $items['year'] }}</p>
    </div>
@endforeach

@php
    $names = [
        25 => 'Joe',
        30 => 'Jane',
    ];
    echo '<pre/>';
    echo var_dump($names);
    echo '</pre>';
    exit();
@endphp
