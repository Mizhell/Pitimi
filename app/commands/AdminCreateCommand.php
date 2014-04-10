<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AdminCreateCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'admin:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new admin user.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		// Check if an admin user exists.
        $admin = User::where('username', 'admin')->first();
        if (count($admin) && $this->confirm('Admin user already exists, delete? [yes|no]')) {
            try {
                User::find($admin->id)->delete();
            } catch (Exception $e) {
                $this->error($e);
                return;
            }
            $this->info('Admin user deleted!');
        }

        // Create admin user.
        $admin = new User;
        $admin->username = 'admin';
        $admin->password = Hash::make($this->secret('Password:'));

        try {
            $admin->save();
        } catch (Exception $e) {
            $this->error($e);
            return;
        }

        $this->info('Admin user created');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
