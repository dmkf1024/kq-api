<?php

namespace kq\kq\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use kq\kq\DayOff as ChildDayOff;
use kq\kq\DayOffQuery as ChildDayOffQuery;
use kq\kq\Map\DayOffTableMap;

/**
 * Base class that represents a query for the 'day_off' table.
 *
 *
 *
 * @method     ChildDayOffQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDayOffQuery orderByCourseId($order = Criteria::ASC) Order by the course_id column
 * @method     ChildDayOffQuery orderByStudentNumber($order = Criteria::ASC) Order by the student_number column
 * @method     ChildDayOffQuery orderByOffDate($order = Criteria::ASC) Order by the off_date column
 * @method     ChildDayOffQuery orderByOffTime($order = Criteria::ASC) Order by the off_time column
 * @method     ChildDayOffQuery orderByCause($order = Criteria::ASC) Order by the cause column
 *
 * @method     ChildDayOffQuery groupById() Group by the id column
 * @method     ChildDayOffQuery groupByCourseId() Group by the course_id column
 * @method     ChildDayOffQuery groupByStudentNumber() Group by the student_number column
 * @method     ChildDayOffQuery groupByOffDate() Group by the off_date column
 * @method     ChildDayOffQuery groupByOffTime() Group by the off_time column
 * @method     ChildDayOffQuery groupByCause() Group by the cause column
 *
 * @method     ChildDayOffQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDayOffQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDayOffQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDayOffQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDayOffQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDayOffQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDayOff findOne(ConnectionInterface $con = null) Return the first ChildDayOff matching the query
 * @method     ChildDayOff findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDayOff matching the query, or a new ChildDayOff object populated from the query conditions when no match is found
 *
 * @method     ChildDayOff findOneById(int $id) Return the first ChildDayOff filtered by the id column
 * @method     ChildDayOff findOneByCourseId(string $course_id) Return the first ChildDayOff filtered by the course_id column
 * @method     ChildDayOff findOneByStudentNumber(string $student_number) Return the first ChildDayOff filtered by the student_number column
 * @method     ChildDayOff findOneByOffDate(string $off_date) Return the first ChildDayOff filtered by the off_date column
 * @method     ChildDayOff findOneByOffTime(string $off_time) Return the first ChildDayOff filtered by the off_time column
 * @method     ChildDayOff findOneByCause(string $cause) Return the first ChildDayOff filtered by the cause column *

 * @method     ChildDayOff requirePk($key, ConnectionInterface $con = null) Return the ChildDayOff by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDayOff requireOne(ConnectionInterface $con = null) Return the first ChildDayOff matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDayOff requireOneById(int $id) Return the first ChildDayOff filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDayOff requireOneByCourseId(string $course_id) Return the first ChildDayOff filtered by the course_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDayOff requireOneByStudentNumber(string $student_number) Return the first ChildDayOff filtered by the student_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDayOff requireOneByOffDate(string $off_date) Return the first ChildDayOff filtered by the off_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDayOff requireOneByOffTime(string $off_time) Return the first ChildDayOff filtered by the off_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDayOff requireOneByCause(string $cause) Return the first ChildDayOff filtered by the cause column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDayOff[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDayOff objects based on current ModelCriteria
 * @method     ChildDayOff[]|ObjectCollection findById(int $id) Return ChildDayOff objects filtered by the id column
 * @method     ChildDayOff[]|ObjectCollection findByCourseId(string $course_id) Return ChildDayOff objects filtered by the course_id column
 * @method     ChildDayOff[]|ObjectCollection findByStudentNumber(string $student_number) Return ChildDayOff objects filtered by the student_number column
 * @method     ChildDayOff[]|ObjectCollection findByOffDate(string $off_date) Return ChildDayOff objects filtered by the off_date column
 * @method     ChildDayOff[]|ObjectCollection findByOffTime(string $off_time) Return ChildDayOff objects filtered by the off_time column
 * @method     ChildDayOff[]|ObjectCollection findByCause(string $cause) Return ChildDayOff objects filtered by the cause column
 * @method     ChildDayOff[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DayOffQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \kq\kq\Base\DayOffQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\kq\\kq\\DayOff', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDayOffQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDayOffQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDayOffQuery) {
            return $criteria;
        }
        $query = new ChildDayOffQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDayOff|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DayOffTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DayOffTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDayOff A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, course_id, student_number, off_date, off_time, cause FROM day_off WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDayOff $obj */
            $obj = new ChildDayOff();
            $obj->hydrate($row);
            DayOffTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildDayOff|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildDayOffQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DayOffTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDayOffQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DayOffTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDayOffQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DayOffTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DayOffTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DayOffTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the course_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCourseId('fooValue');   // WHERE course_id = 'fooValue'
     * $query->filterByCourseId('%fooValue%', Criteria::LIKE); // WHERE course_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $courseId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDayOffQuery The current query, for fluid interface
     */
    public function filterByCourseId($courseId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($courseId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DayOffTableMap::COL_COURSE_ID, $courseId, $comparison);
    }

    /**
     * Filter the query on the student_number column
     *
     * Example usage:
     * <code>
     * $query->filterByStudentNumber('fooValue');   // WHERE student_number = 'fooValue'
     * $query->filterByStudentNumber('%fooValue%', Criteria::LIKE); // WHERE student_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $studentNumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDayOffQuery The current query, for fluid interface
     */
    public function filterByStudentNumber($studentNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($studentNumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DayOffTableMap::COL_STUDENT_NUMBER, $studentNumber, $comparison);
    }

    /**
     * Filter the query on the off_date column
     *
     * Example usage:
     * <code>
     * $query->filterByOffDate('2011-03-14'); // WHERE off_date = '2011-03-14'
     * $query->filterByOffDate('now'); // WHERE off_date = '2011-03-14'
     * $query->filterByOffDate(array('max' => 'yesterday')); // WHERE off_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $offDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDayOffQuery The current query, for fluid interface
     */
    public function filterByOffDate($offDate = null, $comparison = null)
    {
        if (is_array($offDate)) {
            $useMinMax = false;
            if (isset($offDate['min'])) {
                $this->addUsingAlias(DayOffTableMap::COL_OFF_DATE, $offDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($offDate['max'])) {
                $this->addUsingAlias(DayOffTableMap::COL_OFF_DATE, $offDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DayOffTableMap::COL_OFF_DATE, $offDate, $comparison);
    }

    /**
     * Filter the query on the off_time column
     *
     * Example usage:
     * <code>
     * $query->filterByOffTime('2011-03-14'); // WHERE off_time = '2011-03-14'
     * $query->filterByOffTime('now'); // WHERE off_time = '2011-03-14'
     * $query->filterByOffTime(array('max' => 'yesterday')); // WHERE off_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $offTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDayOffQuery The current query, for fluid interface
     */
    public function filterByOffTime($offTime = null, $comparison = null)
    {
        if (is_array($offTime)) {
            $useMinMax = false;
            if (isset($offTime['min'])) {
                $this->addUsingAlias(DayOffTableMap::COL_OFF_TIME, $offTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($offTime['max'])) {
                $this->addUsingAlias(DayOffTableMap::COL_OFF_TIME, $offTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DayOffTableMap::COL_OFF_TIME, $offTime, $comparison);
    }

    /**
     * Filter the query on the cause column
     *
     * Example usage:
     * <code>
     * $query->filterByCause('fooValue');   // WHERE cause = 'fooValue'
     * $query->filterByCause('%fooValue%', Criteria::LIKE); // WHERE cause LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cause The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDayOffQuery The current query, for fluid interface
     */
    public function filterByCause($cause = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cause)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DayOffTableMap::COL_CAUSE, $cause, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDayOff $dayOff Object to remove from the list of results
     *
     * @return $this|ChildDayOffQuery The current query, for fluid interface
     */
    public function prune($dayOff = null)
    {
        if ($dayOff) {
            $this->addUsingAlias(DayOffTableMap::COL_ID, $dayOff->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the day_off table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DayOffTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DayOffTableMap::clearInstancePool();
            DayOffTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DayOffTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DayOffTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DayOffTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DayOffTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DayOffQuery
