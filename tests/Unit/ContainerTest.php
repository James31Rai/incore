<?php
use Core\Container;

test('it can resolve something out of the container', function () {
    // arrange
    $container = new Container();
    // $container->bind('foo', function () {
    //     return 'foo';
    // });
    $container->bind('foo', fn() => 'foo');

    // act
    $result = $container->resolve('foo');

    // assert/expect
    expect($result)->toEqual('foo');
});
