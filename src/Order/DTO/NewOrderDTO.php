<?php

namespace Src\Order\DTO;

use App\Http\Requests\StoreCheckoutRequest;

/**
 * Data transfer object for creating a new order and account during checkout.
 */
final class NewOrderDTO
{
    public function __construct(
        public readonly string $customer_name,
        public readonly string $customer_email,
        public readonly string $password,
        public readonly ?string $password_confirmation,
        public readonly bool $terms,
        public readonly bool $subscribe,
    ) {
    }

    /**
     * Build DTO instance from validated checkout request.
     */
    public static function fromRequest(StoreCheckoutRequest $request): self
    {
        return new self(
            customer_name: trim($request->string('customer_name')->toString()),
            customer_email: strtolower(trim($request->string('customer_email')->toString())),
            password: (string) $request->input('password'),
            password_confirmation: $request->input('password_confirmation') !== null
                ? (string) $request->input('password_confirmation')
                : null,
            terms: $request->boolean('terms'),
            subscribe: $request->boolean('subscribe'),
        );
    }
}
