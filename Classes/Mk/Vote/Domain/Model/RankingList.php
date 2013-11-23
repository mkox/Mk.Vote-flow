<?php
namespace Mk\Vote\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "Mk.Vote".                    *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Ranking list
 *
 * @Flow\Entity
 */
class RankingList {
	
	/**
	 * The overview
	 * @var \Mk\Vote\Domain\Model\Overview
	 * @ORM\ManyToOne(inversedBy="rankingLists")
	 */
	protected $overview;

	/**
	 * The supervisory board
	 * @var \Doctrine\Common\Collections\Collection<\Mk\Vote\Domain\Model\SupervisoryBoard>
	 * @ORM\OneToMany(mappedBy="rankingList")
	 */
	protected $supervisoryBoard;

	/**
	 * The name
	 * @var string
	 */
	protected $name;

	/**
	 * The description
	 * @var string
	 */
	protected $description;
	
	/**
	 * @var array
	 * @Flow\Transient
	 */
	protected $area = array('regional', 'international');
	
	/**
	 * @var array
	 * @Flow\Transient
	 */
	protected $votesPerPartyForAllConnectedSB;
	
	/**
	 * @var array
	 * @Flow\Transient
	 */
	protected $allConnectedSB;
	
	/**
	 * @var array
	 * @Flow\Transient
	 */
	protected $listOfVotesFilteredInBothAreas;

	/**
	 * @var array
	 * @Flow\Transient
	 */
	protected $listOfVoteDifferences;
	
	/**
	 * @var array
	 * @Flow\Transient
	 */
	protected $filteredListOfVoteDifferences;
	
	/**
	 * Constructs this ranking list
	 */
	public function __construct() {
		$this->supervisoryBoard = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Get the Ranking list's supervisory board
	 *
	 * @return \Doctrine\Common\Collections\Collection<\Mk\Vote\Domain\Model\SupervisoryBoard> The Ranking list's supervisory board
	 */
	public function getSupervisoryBoard() {
		return $this->supervisoryBoard;
	}

	/**
	 * Get the Ranking list's name
	 *
	 * @return string The Ranking list's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this Ranking list's name
	 *
	 * @param string $name The Ranking list's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Get the Ranking list's description
	 *
	 * @return string The Ranking list's description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets this Ranking list's description
	 *
	 * @param string $description The Ranking list's description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
	
	
	
	/**
	 * Get the votes per party for all connected supervisory boards
	 *
	 * @return array The votes per party for all connected supervisory boards
	 */
	public function getVotesPerPartyForAllConnectedSB() {
		return $this->votesPerPartyForAllConnectedSB;
	}
	
	/**
	 * Get all connected supervisory boards
	 *
	 * @return array All connected supervisory boards
	 */
	public function getAllConnectedSB() {
		return $this->allConnectedSB;
	}
	
	/**
	 * Get list of votes filtered in both areas
	 *
	 * @return array The list of votes filtered in both areas
	 */
	public function getListOfVotesFilteredInBothAreas() {
		return $this->listOfVotesFilteredInBothAreas;
	}
	
	/**
	 * Get the list of vote differences
	 *
	 * @return string The list of vote differences
	 */
	public function getListOfVoteDifferences() {
		return $this->listOfVoteDifferences;
	}

	/**
	 * Sets the list of vote differences
	 *
	 * @param string $xxxx The Ranking list's name
	 * @return void
	 */
	public function setListOfVoteDifferences($xxxx) {
//		$this->name = $name;
	}
	
		/**
	 * Get the filtered list of vote differences
	 *
	 * @return string The filtered list of vote differences
	 */
	public function getFilteredListOfVoteDifferences() {
		return $this->listOfVoteDifferences;
	}

	/**
	 * Sets the filtered list of vote differences
	 *
	 * @param string $xxxx The Ranking list's name
	 * @return void
	 */
	public function setFilteredListOfVoteDifferences($xxxx) {
//		$this->name = $name;
	}
	
}
	
/**
 * Get sorted list from voteBySainteLague()
 *
 * @return array Sorted list from voteBySainteLague
 */
function compare($valueA, $valueB){

	$a = $valueA['dividedValue'];
	$b = $valueB['dividedValue'];

	if ($a == $b) {
		return 0;
	}

	return ($a < $b) ? +1 : -1;
}

/**
 * Get sorted list of vote differences
 *
 * @return array Sorted list of vote differences
 */
function compareForListOfVoteDifferences($valueA, $valueB){

	$a = $valueA['difference'];
	$b = $valueB['difference'];

	if ($a == $b) {
		return 0;
	}

	return ($a > $b) ? +1 : -1;
}

?>