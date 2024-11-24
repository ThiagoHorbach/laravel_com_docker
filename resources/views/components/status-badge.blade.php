@switch($status)
@case(0)
    <p>Status: Inativo</p>
    @break
@case(1)
    <p>Status: Ativo</p>
    @break
@default
    <p>Status: Indefinido</p>
@endswitch