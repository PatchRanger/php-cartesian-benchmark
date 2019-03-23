<?php

namespace Benchcart\Console\Command;

use Benchcart\Result;
use Benchcart\Runner;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BenchcartCommand extends Command
{
	/**@var Runner */
	private $runner = null;

	public function __construct($name = null)
	{
		$this->runner = new Runner();
		parent::__construct($name);
	}

	protected function configure()
	{
		$this
			->setName('benchcart')
			->setDescription('Run a benchmark of php cartesians')
			->addOption('count', 'c', InputOption::VALUE_OPTIONAL, 'Count of added iterators.', 100)
			->addOption('by', null, InputOption::VALUE_OPTIONAL, 'Number of items in each iterator.', 100);
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$output->writeln('Runtime: PHP ' . phpversion());
		$output->writeln('Host: ' . php_uname());
		$output->writeln('Iterators count: ' . $input->getOption('count'));
		$output->writeln('Each iterator by: ' . $input->getOption('by'));
		$output->writeln('');

		$results = $this->runner->run($input->getOption('count'), $input->getOption('by'));

		// order by duration
		uasort($results, function (Result $a, Result $b) {
			if ($a->getDuration() == $b->getDuration()) {
				return 0;
			}
			return $a->getDuration() > $b->getDuration() ? 1 : -1;
		});

		$rows = array_map(function(Result $result) {
			return [$result->getName(), $result->getDuration(), $result->getMemory()];
		}, $results);

		$table = new Table($output);
		$table->setHeaders(['package', 'duration (MS)', 'MEM (B)']);
		$table->addRows($rows);
		$table->render();
	}
}
