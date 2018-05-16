<?php

namespace Instagram\API\Response\Model;

class ImageVersions2 extends Model {

    /**
     * Image Version Candidates
     * @var ImageVersionCandidate[]
     */
    protected $candidates;

    /**
     * @return ImageVersionCandidate[]
     */
    public function getCandidates()
    {
        return $this->candidates;
    }

    /**
     * @param ImageVersionCandidate[] $candidates
     */
    public function setCandidates($candidates)
    {
        $this->candidates = $candidates;
    }

}