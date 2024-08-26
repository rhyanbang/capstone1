<nav class="active" id="sideBar">
    <ul class="list-unstyled lead">
        <li class="active">
            <a href=""><i class="fa fa-home"></i> Home</a>
        </li>

        <li>
            <a href="{{ route('orders.index') }}"><i class="fa fa-box"></i> Orders</a>
        </li>

        <li>
            <a href="{{route('transactions.index')}}"><i class="fa fa-money-bill fa-lg"></i> Transactions</a>
        </li>

        <li>
            <a href=""><i class="fa fa-tags"></i> Products</a>
        </li>
    </ul>
</nav>

<style>
    #sideBar ul.lead {
        border-bottom: 1px solid #47748b;
        width: fit-content;
    }

    #sideBar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: flex;
        align-items: center;
        width: 30vh;
        color: #008B8B;
        text-decoration: none;
    }

    #sideBar ul li a:hover {
        color: #fff;
        background: #008B8B;
        text-decoration: none !important;
    }

    #sideBar ul li a i {
        margin-right: 10px;
    }

    #sideBar ul li.active>a, a[aria-expanded="true"] {
        color: #fff;
        background: #008B8B;
    }
</style>

