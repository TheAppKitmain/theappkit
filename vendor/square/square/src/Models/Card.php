<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents the payment details of a card to be used for payments. These
 * details are determined by the payment token generated by Web Payments SDK.
 */
class Card implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $cardBrand;

    /**
     * @var string|null
     */
    private $last4;

    /**
     * @var int|null
     */
    private $expMonth;

    /**
     * @var int|null
     */
    private $expYear;

    /**
     * @var string|null
     */
    private $cardholderName;

    /**
     * @var Address|null
     */
    private $billingAddress;

    /**
     * @var string|null
     */
    private $fingerprint;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var bool|null
     */
    private $enabled;

    /**
     * @var string|null
     */
    private $cardType;

    /**
     * @var string|null
     */
    private $prepaidType;

    /**
     * @var string|null
     */
    private $bin;

    /**
     * @var int|null
     */
    private $version;

    /**
     * Returns Id.
     *
     * Unique ID for this card. Generated by Square.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * Unique ID for this card. Generated by Square.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Card Brand.
     *
     * Indicates a card's brand, such as `VISA` or `MASTERCARD`.
     */
    public function getCardBrand(): ?string
    {
        return $this->cardBrand;
    }

    /**
     * Sets Card Brand.
     *
     * Indicates a card's brand, such as `VISA` or `MASTERCARD`.
     *
     * @maps card_brand
     */
    public function setCardBrand(?string $cardBrand): void
    {
        $this->cardBrand = $cardBrand;
    }

    /**
     * Returns Last 4.
     *
     * The last 4 digits of the card number.
     */
    public function getLast4(): ?string
    {
        return $this->last4;
    }

    /**
     * Sets Last 4.
     *
     * The last 4 digits of the card number.
     *
     * @maps last_4
     */
    public function setLast4(?string $last4): void
    {
        $this->last4 = $last4;
    }

    /**
     * Returns Exp Month.
     *
     * The expiration month of the associated card as an integer between 1 and 12.
     */
    public function getExpMonth(): ?int
    {
        return $this->expMonth;
    }

    /**
     * Sets Exp Month.
     *
     * The expiration month of the associated card as an integer between 1 and 12.
     *
     * @maps exp_month
     */
    public function setExpMonth(?int $expMonth): void
    {
        $this->expMonth = $expMonth;
    }

    /**
     * Returns Exp Year.
     *
     * The four-digit year of the card's expiration date.
     */
    public function getExpYear(): ?int
    {
        return $this->expYear;
    }

    /**
     * Sets Exp Year.
     *
     * The four-digit year of the card's expiration date.
     *
     * @maps exp_year
     */
    public function setExpYear(?int $expYear): void
    {
        $this->expYear = $expYear;
    }

    /**
     * Returns Cardholder Name.
     *
     * The name of the cardholder.
     */
    public function getCardholderName(): ?string
    {
        return $this->cardholderName;
    }

    /**
     * Sets Cardholder Name.
     *
     * The name of the cardholder.
     *
     * @maps cardholder_name
     */
    public function setCardholderName(?string $cardholderName): void
    {
        $this->cardholderName = $cardholderName;
    }

    /**
     * Returns Billing Address.
     *
     * Represents a physical address.
     */
    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }

    /**
     * Sets Billing Address.
     *
     * Represents a physical address.
     *
     * @maps billing_address
     */
    public function setBillingAddress(?Address $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * Returns Fingerprint.
     *
     * __Not currently set.__ Intended as a Square-assigned identifier, based
     * on the card number, to identify the card across multiple locations within a
     * single application.
     */
    public function getFingerprint(): ?string
    {
        return $this->fingerprint;
    }

    /**
     * Sets Fingerprint.
     *
     * __Not currently set.__ Intended as a Square-assigned identifier, based
     * on the card number, to identify the card across multiple locations within a
     * single application.
     *
     * @maps fingerprint
     */
    public function setFingerprint(?string $fingerprint): void
    {
        $this->fingerprint = $fingerprint;
    }

    /**
     * Returns Customer Id.
     *
     * The ID of a customer created using the Customers API to be associated with the card.
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The ID of a customer created using the Customers API to be associated with the card.
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Reference Id.
     *
     * An optional user-defined reference ID that associates this card with
     * another entity in an external system. For example, a customer ID from an
     * external customer management system.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * An optional user-defined reference ID that associates this card with
     * another entity in an external system. For example, a customer ID from an
     * external customer management system.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Enabled.
     *
     * Indicates whether or not a card can be used for payments.
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * Sets Enabled.
     *
     * Indicates whether or not a card can be used for payments.
     *
     * @maps enabled
     */
    public function setEnabled(?bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * Returns Card Type.
     *
     * Indicates a card's type, such as `CREDIT` or `DEBIT`.
     */
    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    /**
     * Sets Card Type.
     *
     * Indicates a card's type, such as `CREDIT` or `DEBIT`.
     *
     * @maps card_type
     */
    public function setCardType(?string $cardType): void
    {
        $this->cardType = $cardType;
    }

    /**
     * Returns Prepaid Type.
     *
     * Indicates a card's prepaid type, such as `NOT_PREPAID` or `PREPAID`.
     */
    public function getPrepaidType(): ?string
    {
        return $this->prepaidType;
    }

    /**
     * Sets Prepaid Type.
     *
     * Indicates a card's prepaid type, such as `NOT_PREPAID` or `PREPAID`.
     *
     * @maps prepaid_type
     */
    public function setPrepaidType(?string $prepaidType): void
    {
        $this->prepaidType = $prepaidType;
    }

    /**
     * Returns Bin.
     *
     * The first six digits of the card number, known as the Bank Identification Number (BIN). Only the
     * Payments API
     * returns this field.
     */
    public function getBin(): ?string
    {
        return $this->bin;
    }

    /**
     * Sets Bin.
     *
     * The first six digits of the card number, known as the Bank Identification Number (BIN). Only the
     * Payments API
     * returns this field.
     *
     * @maps bin
     */
    public function setBin(?string $bin): void
    {
        $this->bin = $bin;
    }

    /**
     * Returns Version.
     *
     * Current version number of the card. Increments with each card update. Requests to update an
     * existing Card object will be rejected unless the version in the request matches the current
     * version for the Card.
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * Current version number of the card. Increments with each card update. Requests to update an
     * existing Card object will be rejected unless the version in the request matches the current
     * version for the Card.
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']              = $this->id;
        }
        if (isset($this->cardBrand)) {
            $json['card_brand']      = $this->cardBrand;
        }
        if (isset($this->last4)) {
            $json['last_4']          = $this->last4;
        }
        if (isset($this->expMonth)) {
            $json['exp_month']       = $this->expMonth;
        }
        if (isset($this->expYear)) {
            $json['exp_year']        = $this->expYear;
        }
        if (isset($this->cardholderName)) {
            $json['cardholder_name'] = $this->cardholderName;
        }
        if (isset($this->billingAddress)) {
            $json['billing_address'] = $this->billingAddress;
        }
        if (isset($this->fingerprint)) {
            $json['fingerprint']     = $this->fingerprint;
        }
        if (isset($this->customerId)) {
            $json['customer_id']     = $this->customerId;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']    = $this->referenceId;
        }
        if (isset($this->enabled)) {
            $json['enabled']         = $this->enabled;
        }
        if (isset($this->cardType)) {
            $json['card_type']       = $this->cardType;
        }
        if (isset($this->prepaidType)) {
            $json['prepaid_type']    = $this->prepaidType;
        }
        if (isset($this->bin)) {
            $json['bin']             = $this->bin;
        }
        if (isset($this->version)) {
            $json['version']         = $this->version;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
