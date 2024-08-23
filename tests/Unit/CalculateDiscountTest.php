<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../calculateDiscount.php';

class CalculateDiscountTest extends TestCase
{

    /**
     * Testa o cálculo de desconto para um usuário premium.
     */
    public function testCalculateDiscountForPremiumUser()
    {
        $products = [
            ['price' => 100],
            ['price' => 200],
            ['price' => 300],
        ];
        $user = ['type' => 'premium'];

        $result = calculateDiscount($products, $user);

        $this->assertEquals(540.0, $result);
    }

    /**
     * Testa o cálculo de desconto para um usuário regular.
     */
    public function testCalculateDiscountForRegularUser()
    {
        $products = [
            ['price' => 100],
            ['price' => 200],
            ['price' => 300],
        ];
        $user = ['type' => 'regular'];

        $result = calculateDiscount($products, $user);

        $this->assertEquals(570.0, $result);
    }

    /**
     * Testa o cálculo de desconto para um usuário sem tipo definido.
     */
    public function testCalculateDiscountForUserWithNoType()
    {
        $products = [
            ['price' => 100],
            ['price' => 200],
            ['price' => 300],
        ];
        $user = [];

        $result = calculateDiscount($products, $user);

        $this->assertEquals(600.0, $result);
    }

    /**
     * Testa o cálculo de desconto para um usuário com tipo inválido.
     */
    public function testCalculateDiscountForUserWithInvalidType()
    {
        $products = [
            ['price' => 100],
            ['price' => 200],
            ['price' => 300],
        ];
        $user = ['type' => 'invalid'];

        $result = calculateDiscount($products, $user);

        $this->assertEquals(600.0, $result);
    }

    /**
     * Testa o cálculo de desconto com uma lista de produtos vazia.
     */
    public function testCalculateDiscountWithEmptyProducts()
    {
        $products = [];
        $user = ['type' => 'premium'];

        $result = calculateDiscount($products, $user);

        $this->assertEquals(0.0, $result);
    }

}
