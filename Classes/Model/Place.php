<?php

declare(strict_types=1);

/**
 * This class represents a place.
 *
 * @author Niels Pardon <mail@niels-pardon.de>
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Tx_Seminars_Model_Place extends \Tx_Oelib_Model implements \Tx_Seminars_Interface_Titled
{
    /**
     * Returns our title.
     *
     * @return string our title, will not be empty
     */
    public function getTitle(): string
    {
        return $this->getAsString('title');
    }

    /**
     * Sets our title.
     *
     * @param string $title our title to set, must not be empty
     *
     * @return void
     */
    public function setTitle($title)
    {
        if ($title == '') {
            throw new \InvalidArgumentException('The parameter $title must not be empty.', 1333296894);
        }

        $this->setAsString('title', $title);
    }

    /**
     * Returns our address.
     *
     * @return string our address, might be empty
     */
    public function getAddress(): string
    {
        return $this->getAsString('address');
    }

    /**
     * Sets our address.
     *
     * @param string $address our address to set, may be empty
     *
     * @return void
     */
    public function setAddress($address)
    {
        $this->setAsString('address', $address);
    }

    /**
     * Returns whether this place has an address.
     *
     * @return bool TRUE if this address has an address, FALSE otherwise
     */
    public function hasAddress(): bool
    {
        return $this->hasString('address');
    }

    /**
     * Returns our ZIP code.
     *
     * @return string the ZIP code, might be empty
     */
    public function getZip(): string
    {
        return $this->getAsString('zip');
    }

    /**
     * Sets our ZIP code.
     *
     * @param string $zip our ZIP code, may be empty
     *
     * @return void
     */
    public function setZip($zip)
    {
        $this->setAsString('zip', $zip);
    }

    /**
     * Returns whether this place has a ZIP code.
     *
     * @return bool TRUE if this place has a ZIP code, FALSE otherwise
     */
    public function hasZip(): bool
    {
        return $this->hasString('zip');
    }

    /**
     * Returns our city name.
     *
     * @return string the city name, will not be empty
     */
    public function getCity(): string
    {
        return $this->getAsString('city');
    }

    /**
     * Sets our city name.
     *
     * @param string $city our city name, must not be empty
     *
     * @return void
     */
    public function setCity($city)
    {
        if ($city == '') {
            throw new \InvalidArgumentException('The parameter $city must not be empty.', 1333296904);
        }

        $this->setAsString('city', $city);
    }

    /**
     * Returns the country of this place as \Tx_Oelib_Model_Country.
     *
     * @return \Tx_Oelib_Model_Country|null
     */
    public function getCountry()
    {
        $countryCode = $this->getAsString('country');
        if ($countryCode == '') {
            return null;
        }

        try {
            /** @var \Tx_Oelib_Mapper_Country $mapper */
            $mapper = \Tx_Oelib_MapperRegistry::get(\Tx_Oelib_Mapper_Country::class);
            $country = $mapper->findByIsoAlpha2Code($countryCode);
        } catch (\Tx_Oelib_Exception_NotFound $exception) {
            $country = null;
        }

        return $country;
    }

    /**
     * Sets the country of this place.
     *
     * @param \Tx_Oelib_Model_Country $country
     *        the country to set for this place, can be NULL for "no country"
     *
     * @return void
     */
    public function setCountry(\Tx_Oelib_Model_Country $country = null)
    {
        $countryCode = ($country !== null) ? $country->getIsoAlpha2Code() : '';

        $this->setAsString('country', $countryCode);
    }

    /**
     * Returns whether this place has a country.
     *
     * @return bool TRUE if this place has a country, FALSE otherwise
     */
    public function hasCountry(): bool
    {
        return $this->getCountry() !== null;
    }

    /**
     * Returns our homepage.
     *
     * @return string our homepage, may be empty
     */
    public function getHomepage(): string
    {
        return $this->getAsString('homepage');
    }

    /**
     * Sets our homepage.
     *
     * @param string $homepage our homepage, may be empty
     *
     * @return void
     */
    public function setHomepage($homepage)
    {
        $this->setAsString('homepage', $homepage);
    }

    /**
     * Returns whether this place has a homepage.
     *
     * @return bool TRUE if this place has a homepage, FALSE otherwise
     */
    public function hasHomepage(): bool
    {
        return $this->hasString('homepage');
    }

    /**
     * Returns our directions.
     *
     * @return string our directions, might be empty
     */
    public function getDirections(): string
    {
        return $this->getAsString('directions');
    }

    /**
     * Sets our directions.
     *
     * @param string $directions our directions to set, may be empty
     *
     * @return void
     */
    public function setDirections($directions)
    {
        $this->setAsString('directions', $directions);
    }

    /**
     * Returns whether this place has directions.
     *
     * @return bool TRUE if this place has directions, FALSE otherwise
     */
    public function hasDirections(): bool
    {
        return $this->hasString('directions');
    }

    /**
     * Returns our owner.
     *
     * @return \Tx_Seminars_Model_FrontEndUser|null
     */
    public function getOwner()
    {
        /** @var \Tx_Seminars_Model_FrontEndUser|null $owner */
        $owner = $this->getAsModel('owner');

        return $owner;
    }

    /**
     * Sets our owner.
     *
     * @param \Tx_Seminars_Model_FrontEndUser $frontEndUser the owner of this model to set
     *
     * @return void
     */
    public function setOwner(\Tx_Seminars_Model_FrontEndUser $frontEndUser)
    {
        $this->set('owner', $frontEndUser);
    }

    /**
     * Returns our notes.
     *
     * @return string our notes, may be empty
     */
    public function getNotes(): string
    {
        return $this->getAsString('notes');
    }

    /**
     * Sets our notes.
     *
     * @param string $notes our notes to set, might be empty
     *
     * @return void
     */
    public function setNotes($notes)
    {
        $this->setAsString('notes', $notes);
    }
}
