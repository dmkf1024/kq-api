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
use kq\kq\Course as ChildCourse;
use kq\kq\CourseQuery as ChildCourseQuery;
use kq\kq\Map\CourseTableMap;

/**
 * Base class that represents a query for the 'course' table.
 *
 *
 *
 * @method     ChildCourseQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCourseQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCourseQuery orderByStartWeek($order = Criteria::ASC) Order by the start_week column
 * @method     ChildCourseQuery orderByEndWeek($order = Criteria::ASC) Order by the end_week column
 * @method     ChildCourseQuery orderByDayInWeek($order = Criteria::ASC) Order by the day_in_week column
 * @method     ChildCourseQuery orderByStartClass($order = Criteria::ASC) Order by the start_class column
 * @method     ChildCourseQuery orderByEndClass($order = Criteria::ASC) Order by the end_class column
 * @method     ChildCourseQuery orderByTeacherId($order = Criteria::ASC) Order by the teacher_id column
 * @method     ChildCourseQuery orderByClassroom($order = Criteria::ASC) Order by the classroom column
 *
 * @method     ChildCourseQuery groupById() Group by the id column
 * @method     ChildCourseQuery groupByName() Group by the name column
 * @method     ChildCourseQuery groupByStartWeek() Group by the start_week column
 * @method     ChildCourseQuery groupByEndWeek() Group by the end_week column
 * @method     ChildCourseQuery groupByDayInWeek() Group by the day_in_week column
 * @method     ChildCourseQuery groupByStartClass() Group by the start_class column
 * @method     ChildCourseQuery groupByEndClass() Group by the end_class column
 * @method     ChildCourseQuery groupByTeacherId() Group by the teacher_id column
 * @method     ChildCourseQuery groupByClassroom() Group by the classroom column
 *
 * @method     ChildCourseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCourseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCourseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCourseQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCourseQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCourseQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCourse findOne(ConnectionInterface $con = null) Return the first ChildCourse matching the query
 * @method     ChildCourse findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCourse matching the query, or a new ChildCourse object populated from the query conditions when no match is found
 *
 * @method     ChildCourse findOneById(string $id) Return the first ChildCourse filtered by the id column
 * @method     ChildCourse findOneByName(string $name) Return the first ChildCourse filtered by the name column
 * @method     ChildCourse findOneByStartWeek(int $start_week) Return the first ChildCourse filtered by the start_week column
 * @method     ChildCourse findOneByEndWeek(int $end_week) Return the first ChildCourse filtered by the end_week column
 * @method     ChildCourse findOneByDayInWeek(int $day_in_week) Return the first ChildCourse filtered by the day_in_week column
 * @method     ChildCourse findOneByStartClass(int $start_class) Return the first ChildCourse filtered by the start_class column
 * @method     ChildCourse findOneByEndClass(int $end_class) Return the first ChildCourse filtered by the end_class column
 * @method     ChildCourse findOneByTeacherId(string $teacher_id) Return the first ChildCourse filtered by the teacher_id column
 * @method     ChildCourse findOneByClassroom(string $classroom) Return the first ChildCourse filtered by the classroom column *

 * @method     ChildCourse requirePk($key, ConnectionInterface $con = null) Return the ChildCourse by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOne(ConnectionInterface $con = null) Return the first ChildCourse matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCourse requireOneById(string $id) Return the first ChildCourse filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByName(string $name) Return the first ChildCourse filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByStartWeek(int $start_week) Return the first ChildCourse filtered by the start_week column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByEndWeek(int $end_week) Return the first ChildCourse filtered by the end_week column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByDayInWeek(int $day_in_week) Return the first ChildCourse filtered by the day_in_week column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByStartClass(int $start_class) Return the first ChildCourse filtered by the start_class column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByEndClass(int $end_class) Return the first ChildCourse filtered by the end_class column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByTeacherId(string $teacher_id) Return the first ChildCourse filtered by the teacher_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourse requireOneByClassroom(string $classroom) Return the first ChildCourse filtered by the classroom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCourse[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCourse objects based on current ModelCriteria
 * @method     ChildCourse[]|ObjectCollection findById(string $id) Return ChildCourse objects filtered by the id column
 * @method     ChildCourse[]|ObjectCollection findByName(string $name) Return ChildCourse objects filtered by the name column
 * @method     ChildCourse[]|ObjectCollection findByStartWeek(int $start_week) Return ChildCourse objects filtered by the start_week column
 * @method     ChildCourse[]|ObjectCollection findByEndWeek(int $end_week) Return ChildCourse objects filtered by the end_week column
 * @method     ChildCourse[]|ObjectCollection findByDayInWeek(int $day_in_week) Return ChildCourse objects filtered by the day_in_week column
 * @method     ChildCourse[]|ObjectCollection findByStartClass(int $start_class) Return ChildCourse objects filtered by the start_class column
 * @method     ChildCourse[]|ObjectCollection findByEndClass(int $end_class) Return ChildCourse objects filtered by the end_class column
 * @method     ChildCourse[]|ObjectCollection findByTeacherId(string $teacher_id) Return ChildCourse objects filtered by the teacher_id column
 * @method     ChildCourse[]|ObjectCollection findByClassroom(string $classroom) Return ChildCourse objects filtered by the classroom column
 * @method     ChildCourse[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CourseQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \kq\kq\Base\CourseQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\kq\\kq\\Course', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCourseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCourseQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCourseQuery) {
            return $criteria;
        }
        $query = new ChildCourseQuery();
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
     * @return ChildCourse|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CourseTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CourseTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCourse A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, start_week, end_week, day_in_week, start_class, end_class, teacher_id, classroom FROM course WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCourse $obj */
            $obj = new ChildCourse();
            $obj->hydrate($row);
            CourseTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCourse|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CourseTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CourseTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%', Criteria::LIKE); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the start_week column
     *
     * Example usage:
     * <code>
     * $query->filterByStartWeek(1234); // WHERE start_week = 1234
     * $query->filterByStartWeek(array(12, 34)); // WHERE start_week IN (12, 34)
     * $query->filterByStartWeek(array('min' => 12)); // WHERE start_week > 12
     * </code>
     *
     * @param     mixed $startWeek The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByStartWeek($startWeek = null, $comparison = null)
    {
        if (is_array($startWeek)) {
            $useMinMax = false;
            if (isset($startWeek['min'])) {
                $this->addUsingAlias(CourseTableMap::COL_START_WEEK, $startWeek['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startWeek['max'])) {
                $this->addUsingAlias(CourseTableMap::COL_START_WEEK, $startWeek['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_START_WEEK, $startWeek, $comparison);
    }

    /**
     * Filter the query on the end_week column
     *
     * Example usage:
     * <code>
     * $query->filterByEndWeek(1234); // WHERE end_week = 1234
     * $query->filterByEndWeek(array(12, 34)); // WHERE end_week IN (12, 34)
     * $query->filterByEndWeek(array('min' => 12)); // WHERE end_week > 12
     * </code>
     *
     * @param     mixed $endWeek The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByEndWeek($endWeek = null, $comparison = null)
    {
        if (is_array($endWeek)) {
            $useMinMax = false;
            if (isset($endWeek['min'])) {
                $this->addUsingAlias(CourseTableMap::COL_END_WEEK, $endWeek['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endWeek['max'])) {
                $this->addUsingAlias(CourseTableMap::COL_END_WEEK, $endWeek['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_END_WEEK, $endWeek, $comparison);
    }

    /**
     * Filter the query on the day_in_week column
     *
     * Example usage:
     * <code>
     * $query->filterByDayInWeek(1234); // WHERE day_in_week = 1234
     * $query->filterByDayInWeek(array(12, 34)); // WHERE day_in_week IN (12, 34)
     * $query->filterByDayInWeek(array('min' => 12)); // WHERE day_in_week > 12
     * </code>
     *
     * @param     mixed $dayInWeek The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByDayInWeek($dayInWeek = null, $comparison = null)
    {
        if (is_array($dayInWeek)) {
            $useMinMax = false;
            if (isset($dayInWeek['min'])) {
                $this->addUsingAlias(CourseTableMap::COL_DAY_IN_WEEK, $dayInWeek['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dayInWeek['max'])) {
                $this->addUsingAlias(CourseTableMap::COL_DAY_IN_WEEK, $dayInWeek['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_DAY_IN_WEEK, $dayInWeek, $comparison);
    }

    /**
     * Filter the query on the start_class column
     *
     * Example usage:
     * <code>
     * $query->filterByStartClass(1234); // WHERE start_class = 1234
     * $query->filterByStartClass(array(12, 34)); // WHERE start_class IN (12, 34)
     * $query->filterByStartClass(array('min' => 12)); // WHERE start_class > 12
     * </code>
     *
     * @param     mixed $startClass The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByStartClass($startClass = null, $comparison = null)
    {
        if (is_array($startClass)) {
            $useMinMax = false;
            if (isset($startClass['min'])) {
                $this->addUsingAlias(CourseTableMap::COL_START_CLASS, $startClass['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startClass['max'])) {
                $this->addUsingAlias(CourseTableMap::COL_START_CLASS, $startClass['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_START_CLASS, $startClass, $comparison);
    }

    /**
     * Filter the query on the end_class column
     *
     * Example usage:
     * <code>
     * $query->filterByEndClass(1234); // WHERE end_class = 1234
     * $query->filterByEndClass(array(12, 34)); // WHERE end_class IN (12, 34)
     * $query->filterByEndClass(array('min' => 12)); // WHERE end_class > 12
     * </code>
     *
     * @param     mixed $endClass The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByEndClass($endClass = null, $comparison = null)
    {
        if (is_array($endClass)) {
            $useMinMax = false;
            if (isset($endClass['min'])) {
                $this->addUsingAlias(CourseTableMap::COL_END_CLASS, $endClass['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endClass['max'])) {
                $this->addUsingAlias(CourseTableMap::COL_END_CLASS, $endClass['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_END_CLASS, $endClass, $comparison);
    }

    /**
     * Filter the query on the teacher_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTeacherId('fooValue');   // WHERE teacher_id = 'fooValue'
     * $query->filterByTeacherId('%fooValue%', Criteria::LIKE); // WHERE teacher_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $teacherId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByTeacherId($teacherId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($teacherId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_TEACHER_ID, $teacherId, $comparison);
    }

    /**
     * Filter the query on the classroom column
     *
     * Example usage:
     * <code>
     * $query->filterByClassroom('fooValue');   // WHERE classroom = 'fooValue'
     * $query->filterByClassroom('%fooValue%', Criteria::LIKE); // WHERE classroom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $classroom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function filterByClassroom($classroom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($classroom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourseTableMap::COL_CLASSROOM, $classroom, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCourse $course Object to remove from the list of results
     *
     * @return $this|ChildCourseQuery The current query, for fluid interface
     */
    public function prune($course = null)
    {
        if ($course) {
            $this->addUsingAlias(CourseTableMap::COL_ID, $course->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the course table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CourseTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CourseTableMap::clearInstancePool();
            CourseTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CourseTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CourseTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CourseTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CourseTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CourseQuery
