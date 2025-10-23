<?php

namespace App\Livewire;

use App\Models\Chirp;
use App\Models\Vote;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

/**
 * Like/Dislike Component
 */
class LikeDislike extends Component
{
    /**
     * The chirp being voted on
     *
     * @var Chirp
     */
    public Chirp $chirp;
    /**
     * The vote for the current chirp
     * @var Vote|null
     */
    public ?Vote $userVote = null;
    /**
     * The previous value of the vote
     *
     * @var int
     */
    public int $lastUserVote = 0;
    /**
     * Total Likes
     *
     * @var int
     */
    public int $likes = 0;
    /**
     * Total Dislikes
     * @var int
     */
    public int $dislikes = 0;

    /**
     * Mount (Activate) the component
     *
     * When the component is "inserted" into the page, initialise
     * any required component properties.
     *
     * @param Chirp $chirp
     * @return void
     */
    public function mount(Chirp $chirp): void
    {
        $this->chirp = $chirp;
        $this->userVote = $chirp->userVotes;
        $this->lastUserVote = $this->userVote->vote ?? 0;
        $this->likes = $chirp->likesCount;
        $this->dislikes = $chirp->dislikesCount;
    }

    /**
     * Update the Likes
     *
     * @return void
     */
    public function like()
    {
        // TODO: Validate Access

        if ($this->hasVoted(1)) {
            // Update the vote (change value)
            $this->updateVote(0);
        } else {
            // update the vote (to 1)
            $this->updateVote(1);
        }
    }

    /**
     * Update Dislikes
     *
     * @return void
     */
    public function dislike()
    {
        // TODO: Validate Access

        if ($this->hasVoted(-1)) {
            // Update the vote (change value)
            $this->updateVote(0);
        } else {
            // update the vote (to -1)
            $this->updateVote(-1);
        }
    }

    /**
     * Verify that the user is NOT a guest
     * - Guest users are not allowed to vote
     *
     * @return bool
     * @throws \Throwable
     */
    private function validateAccess(): bool
    {
        throw_if(
            auth()->guest(),
            ValidationException::withMessages([
                'unauthenticated' =>
                    'You need to <a href="'
                    . route('login')
                    . '" class="underline">login</a> to click like/dislike'
            ])
        );
        return true;
    }

    /**
     * Check if the authenticated user has voted for the current chirp
     *
     * @param int $value
     * @return bool
     */
    private function hasVoted(int $value): bool
    {
        return $this->userVote &&
            $this->userVote->vote === $value;
    }

    /**
     * Update the vote value
     * - If user has voted change their vote
     * - If user has not voted then create their vote
     * - Update the likes and dislikes totals
     * - Update the last user vote value for this chirp
     *
     * @param int $value
     * @return void
     */
    private function updateVote(int $value): void
    {
        if ($this->userVote) {
            $this->chirp->votes()
                ->update(['user_id' => auth()->id(), 'vote' => $value]);
        } else {
            $this->userVote = $this->chirp->votes()
                ->create(['user_id' => auth()->id(), 'vote' => $value]);
        }

        $this->setLikesAndDislikesCount($value);

        $this->lastUserVote = $value;
    }

    /**
     * Set the Likes and Dislikes counts
     *
     * Depending on the last vote value and the new value, we update
     * the likes and dislikes counts.
     *
     * @param int $value
     * @return void
     */
    private function setLikesAndDislikesCount(int $value): void
    {
        match (true) {
            $this->lastUserVote === 0 && $value === 1 => $this->likes++,
            $this->lastUserVote === 0 && $value === -1 => $this->dislikes++,
            $this->lastUserVote === 1 && $value === 0 => $this->likes--,
            $this->lastUserVote === -1 && $value === 0 => $this->dislikes--,

            $this->lastUserVote === 1 && $value === -1 => call_user_func(
                function () {
                    $this->dislikes++;
                    $this->likes--;
                }
            ),
            $this->lastUserVote === -1 && $value === 1 => call_user_func(
                function () {
                    $this->dislikes--;
                    $this->likes++;
                }
            ),

            $this->lastUserVote === 0 && $value === 0 => call_user_func(
                function () {
                    // This is a precautionary "Do Nothing" for the
                    // intermittent, and rare cases where the click
                    // appears to neither like, nor dislike
                }
            ),
        };

    }


    /**
     * Render the component on screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View|object
     */
    public function render()
    {
        return view('livewire.like-dislike');
    }

}
