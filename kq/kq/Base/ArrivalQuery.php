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
use kq\kq\Arrival as ChildArrival;
use kq\kq\ArrivalQuery as ChildArrivalQuery;
use kq\kq\Map\ArrivalTableMap;

/**
 * Base class that represents a query for the 'arrival' table.
 *
 *
 *
 * @method     ChildArrivalQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildArrivalQuery orderByCourseId($order = Criteria::ASC) Order by the course_id column
 * @method     ChildArrivalQuery orderByStudentId($order = Criteria::ASC) Order by the student_id column
 * @method     ChildArrivalQuery orderByArrivalDate($order = Criteria::ASC) Order by the arrival_date column
 * @method     ChildArrivalQuery orderByArrivalTime($order = Criteria::ASC) Order by the arrival_time column
 *
 * @method     ChildArrivalQuery groupById() Group by the id column
 * @method     ChildArrivalQuery groupByCourseId() Group by the course_id column
 * @method     ChildArrivalQuery groupByStudentId() Group by the student_id column
 * @method     ChildArrivalQuery groupByArrivalDate() Group by the arrival_date column
 * @method     ChildArrivalQuery groupByArrivalTime() Group by the arrival_time column
 *
 * @method     ChildArrivalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildArrivalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildArrivalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildArrivalQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildArrivalQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildArrivalQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildArrival findOne(ConnectionInterface $con = null) Return the first ChildArrival matching the query
 * @method     ChildArrival findOneOrCreate(ConnectionInterface $con = null) Return the first ChildArrival matching the query, or a new ChildArrival object populated from the query conditions when no match is found
 *
 * @method     ChildArrival findOneById(int $id) Return the first ChildArrival filtered by the id column
 * @method     ChildArrival findOneByCourseId(string $course_id) Return the first ChildArrival filtered by the course_id column
 * @method     ChildArrival findOneByStudentId(string $student_id) Return the first ChildArrival filtered by the student_id column
 * @method     ChildArrival findOneByArrivalDate(string $arrival_date) Return the first ChildArrival filtered by the arrival_date column
 * @method     ChildArrival findOneByArrivalTime(string $arrival_time) Return the first ChildArrival filtered by the arrival_time column *

 * @method     ChildArrival requirePk($key, ConnectionInterface $con = null) Return the ChildArrival by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArrival requireOne(ConnectionInterface $con = null) Return the first ChildArrival matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArrival requireOneById(int $id) Return the first ChildArrival filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArrival requireOneByCourseId(string $course_id) Return the first ChildArrival filtered by the course_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArrival requireOneByStudentId(string $student_id) Return the first ChildArrival filtered by the student_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArrival requireOneByArrivalDate(string $arrival_date) Return the first ChildArrival filtered by the arrival_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArrival requireOneByArrivalTime(string $arrival_time) Return the first ChildArrival filtered by the arrival_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArrival[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildArrival objects based on current ModelCriteria
 * @method     ChildArrival[]|ObjectCollection findById(int $id) Return ChildArrival objects filtered by the id column
 * @method     ChildArrival[]|ObjectCollection findByCourseId(string $course_id) Return ChildArrival objects filtered by the course_id column
 * @method     ChildArrival[]|ObjectCollection findByStudentId(string $student_id) Return ChildArrival objects filtered by the student_id column
 * @method     ChildArrival[]|ObjectCollection findByArrivalDate(string $arrival_date) Return ChildArrival objects filtered by the arrival_date column
 * @method     ChildArrival[]|ObjectCollection findByArrivalTime(string $arrival_time) Return ChildArrival objects filtered by the arrival_time column
 * @method     ChildArrival[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ArrivalQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \kq\kq\Base\ArrivalQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\kq\\kq\\Arrival', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildArrivalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildArrivalQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildArrivalQuery) {
            return $criteria;
        }
        $query = new ChildArrivalQuery();
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
     * @return ChildArrival|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ArrivalTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ArrivalTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildArrival A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, course_id, student_id, arrival_date, arrival_time FROM arrival WHERE id = :p0';
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
            /** @var ChildArrival $obj */
            $obj = new ChildArrival();
            $obj->hydrate($row);
            ArrivalTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildArrival|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildArrivalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ArrivalTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildArrivalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ArrivalTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildArrivalQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ArrivalTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ArrivalTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildArrivalQuery The current query, for fluid interface
     */
    public function filterByCourseId($courseId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($courseId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalTableMap::COL_COURSE_ID, $courseId, $comparison);
    }

    /**
     * Filter the query on the student_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStudentId('fooValue');   // WHERE student_id = 'fooValue'
     * $query->filterByStudentId('%fooValue%', Criteria::LIKE); // WHERE student_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $studentId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArrivalQuery The current query, for fluid interface
     */
    public function filterByStudentId($studentId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($studentId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalTableMap::COL_STUDENT_ID, $studentId, $comparison);
    }

    /**
     * Filter the query on the arrival_date column
     *
     * Example usage:
     * <code>
     * $query->filterByArrivalDate('2011-03-14'); // WHERE arrival_date = '2011-03-14'
     * $query->filterByArrivalDate('now'); // WHERE arrival_date = '2011-03-14'
     * $query->filterByArrivalDate(array('max' => 'yesterday')); // WHERE arrival_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $arrivalDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArrivalQuery The current query, for fluid interface
     */
    public function filterByArrivalDate($arrivalDate = null, $comparison = null)
    {
        if (is_array($arrivalDate)) {
            $useMinMax = false;
            if (isset($arrivalDate['min'])) {
                $this->addUsingAlias(ArrivalTableMap::COL_ARRIVAL_DATE, $arrivalDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($arrivalDate['max'])) {
                $this->addUsingAlias(ArrivalTableMap::COL_ARRIVAL_DATE, $arrivalDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalTableMap::COL_ARRIVAL_DATE, $arrivalDate, $comparison);
    }

    /**
     * Filter the query on the arrival_time column
     *
     * Example usage:
     * <code>
     * $query->filterByArrivalTime('2011-03-14'); // WHERE arrival_time = '2011-03-14'
     * $query->filterByArrivalTime('now'); // WHERE arrival_time = '2011-03-14'
     * $query->filterByArrivalTime(array('max' => 'yesterday')); // WHERE arrival_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $arrivalTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArrivalQuery The current query, for fluid interface
     */
    public function filterByArrivalTime($arrivalTime = null, $comparison = null)
    {
        if (is_array($arrivalTime)) {
            $useMinMax = false;
            if (isset($arrivalTime['min'])) {
                $this->addUsingAlias(ArrivalTableMap::COL_ARRIVAL_TIME, $arrivalTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($arrivalTime['max'])) {
                $this->addUsingAlias(ArrivalTableMap::COL_ARRIVAL_TIME, $arrivalTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArrivalTableMap::COL_ARRIVAL_TIME, $arrivalTime, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildArrival $arrival Object to remove from the list of results
     *
     * @return $this|ChildArrivalQuery The current query, for fluid interface
     */
    public function prune($arrival = null)
    {
        if ($arrival) {
            $this->addUsingAlias(ArrivalTableMap::COL_ID, $arrival->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the arrival table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArrivalTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ArrivalTableMap::clearInstancePool();
            ArrivalTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ArrivalTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ArrivalTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ArrivalTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ArrivalTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ArrivalQuery
